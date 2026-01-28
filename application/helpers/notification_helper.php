<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('send_notification')) {
    /**
     * Send notification (both in-app and email)
     */
    function send_notification($user_id, $type, $title, $message, $car_id = null, $send_email = true) {
        error_log("=== SEND_NOTIFICATION CALLED ===");
        error_log("User ID: " . $user_id);
        error_log("Type: " . $type);
        error_log("Title: " . $title);
        error_log("Send Email: " . ($send_email ? 'YES' : 'NO'));
        
        $CI =& get_instance();
        $CI->load->model('Notification_model');
        $CI->load->model('User_model');
        
        // Create in-app notification
        $notification_data = array(
            'user_id' => $user_id,
            'car_id' => $car_id,
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'is_read' => 0
        );
        
        $CI->Notification_model->create_notification($notification_data);
        error_log("✅ In-app notification created");
        
        // Send email if enabled
        if ($send_email) {
            error_log("Attempting to send email...");
            $user = $CI->User_model->get_profile($user_id);
            
            error_log("User data: " . print_r($user, true));
            
            if ($user && !empty($user['email'])) {
                error_log("User email found: " . $user['email']);
                $result = send_notification_email($user['email'], $user['username'], $type, $title, $message, $car_id);
                error_log("Email send result: " . ($result ? 'SUCCESS' : 'FAILED'));
            } else {
                error_log("❌ User or email not found!");
            }
        } else {
            error_log("Email sending is disabled");
        }
        
        error_log("=== END SEND_NOTIFICATION ===");
    }
}


if (!function_exists('send_notification_email')) {
    /**
     * Send notification email
     */
    function send_notification_email($to_email, $user_name, $type, $title, $message, $car_id = null) {
        error_log("=== SEND_NOTIFICATION_EMAIL CALLED ===");
        error_log("To: " . $to_email);
        error_log("User: " . $user_name);
        error_log("Type: " . $type);
        
        $CI =& get_instance();
        $CI->load->library('email');
        
        // Initialize email with config
        $CI->email->initialize();
        
        $from_email = 'info@zogglo.se'; 
        $from_name = 'Zogglo Car Auction';
        
        error_log("From: " . $from_email);
        
        $CI->email->from($from_email, $from_name);
        $CI->email->to($to_email);
        $CI->email->subject($title);
        
        // Get car details if car_id is provided
        $car_link = '';
        $car_title = '';
        if ($car_id) {
            $CI->load->model('User_model');
            $car = $CI->User_model->get_car_by_id($car_id);
            if ($car) {
                $car_title = $car['car_title'];
                $car_link = base_url('car/' . $car['car_slug']);
                error_log("Car: " . $car_title);
                error_log("Link: " . $car_link);
            }
        }
        
        // Email template based on type
        $email_body = get_email_template($type, $user_name, $message, $car_title, $car_link);
        
        $CI->email->message($email_body);
        
        error_log("Attempting to send email now...");
        
        // Try to send and log result
        if ($CI->email->send()) {
            error_log("✅ Email sent successfully!");
            return true;
        } else {
            error_log("❌ Email FAILED!");
            error_log($CI->email->print_debugger());
            return false;
        }
    }
}


if (!function_exists('get_email_template')) {
    /**
     * Get HTML email template
     */
    function get_email_template($type, $user_name, $message, $car_title = '', $car_link = '') {
        error_log("=== GET_EMAIL_TEMPLATE ===");
        error_log("Type: " . $type);
        
        $icon = '';
        $color = '';
        
        switch ($type) {
            case 'outbid':
                $icon = '⚠️';
                $color = '#f59e0b';
                break;
            case 'won':
                $icon = '🏆';
                $color = '#10b981';
                break;
            case 'lost':
                $icon = '😔';
                $color = '#ef4444';
                break;
            case 'new_bid':
                $icon = '💰';
                $color = '#3b82f6';
                break;
            case 'auto_bid_max_reached':
                $icon = '🔔';
                $color = '#f59e0b';
                break;
            default:
                $icon = '📢';
                $color = '#6b7280';
        }
        
        $html = '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f4f4f4; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        
        <div style="background-color: ' . $color . '; padding: 30px 20px; text-align: center;">
            <h1 style="color: #ffffff; margin: 0; font-size: 28px;">' . $icon . ' Zogglo Auction</h1>
        </div>
        
        <div style="padding: 30px 20px;">
            <p style="font-size: 16px; margin-bottom: 10px;">Hej ' . htmlspecialchars($user_name) . ',</p>
            
            <div style="background-color: #f9fafb; padding: 20px; border-left: 4px solid ' . $color . '; margin: 20px 0; border-radius: 4px;">
                <p style="margin: 0; font-size: 16px; font-weight: 600;">' . htmlspecialchars($message) . '</p>
            </div>';
        
        if ($car_title && $car_link) {
            $html .= '
            <div style="margin: 20px 0;">
                <p style="font-size: 14px; color: #666; margin-bottom: 10px;"><strong>Bil:</strong> ' . htmlspecialchars($car_title) . '</p>
                <a href="' . $car_link . '" style="display: inline-block; background-color: ' . $color . '; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; font-weight: 600;">Visa Bilen</a>
            </div>';
        }
        
        $html .= '
        </div>
        
        <div style="background-color: #f9fafb; padding: 20px; text-align: center; border-top: 1px solid #e5e7eb;">
            <p style="margin: 0; font-size: 12px; color: #6b7280;">
                © ' . date('Y') . ' Zogglo Car Auction. Alla rättigheter förbehållna.
            </p>
        </div>
        
    </div>
</body>
</html>';
        
        error_log("Email template generated successfully");
        return $html;
    }
}


if (!function_exists('notify_outbid')) {
    /**
     * Notify user they've been outbid
     */
    function notify_outbid($user_id, $car_id, $new_bid_amount) {
        $title = 'Du har blivit överbjuden!';
        $message = 'Någon har lagt ett högre bud på ' . number_format($new_bid_amount) . ' SEK.';
        send_notification($user_id, 'outbid', $title, $message, $car_id);
    }
}

if (!function_exists('notify_auto_bid_max_reached')) {
    /**
     * Notify user their auto-bid max has been reached
     */
    function notify_auto_bid_max_reached($user_id, $car_id, $max_amount) {
        $title = 'Max Auto-Bud Uppnått';
        $message = 'Din maximala auto-bud gräns på ' . number_format($max_amount) . ' SEK har nåtts. Överväg att höja ditt max-bud.';
        send_notification($user_id, 'auto_bid_max_reached', $title, $message, $car_id);
    }
}

if (!function_exists('notify_auction_won')) {
    /**
     * Notify user they won the auction
     */
    function notify_auction_won($user_id, $car_id, $winning_bid) {
        $title = 'Grattis! Du vann auktionen! 🏆';
        $message = 'Du har vunnit auktionen med ett bud på ' . number_format($winning_bid) . ' SEK!';
        send_notification($user_id, 'won', $title, $message, $car_id);
    }
}

if (!function_exists('notify_auction_lost')) {
    /**
     * Notify user they lost the auction
     */
    function notify_auction_lost($user_id, $car_id) {
        $title = 'Auktionen avslutades';
        $message = 'Tyvärr vann du inte denna auktion. Fortsätt leta efter din drömbil!';
        send_notification($user_id, 'lost', $title, $message, $car_id);
    }
}