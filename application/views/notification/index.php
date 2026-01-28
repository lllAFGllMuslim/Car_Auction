<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
.notifications-page {
    max-width: 1200px;
    margin: 50px auto;
    padding: 20px;
}

.notifications-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 2px solid #e5e7eb;
}

.notifications-header h1 {
    font-size: 28px;
    font-weight: 700;
    color: #111827;
    margin: 0;
}

.mark-all-read-btn {
    background-color: #3b82f6;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.2s;
}

.mark-all-read-btn:hover {
    background-color: #2563eb;
}

.notification-card {
    background-color: white;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 15px;
    transition: all 0.2s;
    cursor: pointer;
}

.notification-card:hover {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
}

.notification-card.unread {
    background-color: #eff6ff;
    border-left: 4px solid #3b82f6;
}

.notification-header-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 10px;
}

.notification-type-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
}

.badge-outbid {
    background-color: #fef3c7;
    color: #92400e;
}

.badge-won {
    background-color: #d1fae5;
    color: #065f46;
}

.badge-lost {
    background-color: #fee2e2;
    color: #991b1b;
}

.badge-new_bid {
    background-color: #dbeafe;
    color: #1e40af;
}

.badge-auto_bid_max_reached {
    background-color: #fef3c7;
    color: #92400e;
}

.notification-title {
    font-size: 18px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 8px;
}

.notification-message {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 10px;
    line-height: 1.5;
}

.notification-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 12px;
    color: #9ca3af;
}

.notification-time {
    font-style: italic;
}

.notification-actions {
    display: flex;
    gap: 10px;
}

.delete-btn {
    color: #ef4444;
    cursor: pointer;
    padding: 5px 10px;
    border-radius: 4px;
    transition: background-color 0.2s;
}

.delete-btn:hover {
    background-color: #fee2e2;
}

.no-notifications {
    text-align: center;
    padding: 60px 20px;
    color: #9ca3af;
}

.no-notifications i {
    font-size: 64px;
    margin-bottom: 20px;
    color: #d1d5db;
}

.no-notifications h3 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #6b7280;
}

.no-notifications p {
    font-size: 14px;
}
</style>

<div class="notifications-page">
    <div class="notifications-header">
        <h1>📬 Notifikationer</h1>
        <?php if ($unread_count > 0): ?>
        <button class="mark-all-read-btn" id="markAllReadBtn">
            Markera alla som lästa (<?php echo $unread_count; ?>)
        </button>
        <?php endif; ?>
    </div>

    <div id="notificationsList">
        <?php if (!empty($notifications)): ?>
            <?php foreach ($notifications as $notification): ?>
                <div class="notification-card <?php echo $notification['is_read'] == 0 ? 'unread' : ''; ?>" 
                     data-id="<?php echo $notification['id']; ?>"
                     data-car-id="<?php echo $notification['car_id']; ?>">
                    
                    <div class="notification-header-row">
                        <span class="notification-type-badge badge-<?php echo $notification['type']; ?>">
                            <?php
                            $type_labels = array(
                                'outbid' => '⚠️ Överbjuden',
                                'won' => '🏆 Vunnit',
                                'lost' => '😔 Förlorad',
                                'new_bid' => '💰 Nytt Bud',
                                'auto_bid_max_reached' => '🔔 Max Uppnått'
                            );
                            echo isset($type_labels[$notification['type']]) ? $type_labels[$notification['type']] : $notification['type'];
                            ?>
                        </span>
                        <?php if ($notification['is_read'] == 0): ?>
                        <span style="width: 10px; height: 10px; background-color: #3b82f6; border-radius: 50%; display: inline-block;"></span>
                        <?php endif; ?>
                    </div>

                    <div class="notification-title">
                        <?php echo htmlspecialchars($notification['title']); ?>
                    </div>

                    <div class="notification-message">
                        <?php echo htmlspecialchars($notification['message']); ?>
                    </div>

                    <div class="notification-footer">
                        <span class="notification-time">
                            <?php echo timeAgo($notification['created_at']); ?>
                        </span>
                        <div class="notification-actions">
                            <?php if ($notification['car_id']): ?>
                            <a href="<?php echo base_url('car/' . $notification['car_id']); ?>" 
                               style="color: #3b82f6; text-decoration: none;">
                                Visa Bil →
                            </a>
                            <?php endif; ?>
                            <span class="delete-btn" data-id="<?php echo $notification['id']; ?>">
                                🗑️ Radera
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="no-notifications">
                <i class="fa fa-bell-slash"></i>
                <h3>Inga notifikationer</h3>
                <p>Du har inga notifikationer ännu. När något händer med dina bud kommer det att visas här.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
// Helper function for time ago
function timeAgo($datetime) {
    $time_ago = strtotime($datetime);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    
    $minutes = round($seconds / 60);
    $hours = round($seconds / 3600);
    $days = round($seconds / 86400);
    $weeks = round($seconds / 604800);
    $months = round($seconds / 2629440);
    $years = round($seconds / 31553280);
    
    if ($seconds <= 60) {
        return "Just nu";
    } else if ($minutes <= 60) {
        return ($minutes == 1) ? "1 minut sedan" : "$minutes minuter sedan";
    } else if ($hours <= 24) {
        return ($hours == 1) ? "1 timme sedan" : "$hours timmar sedan";
    } else if ($days <= 7) {
        return ($days == 1) ? "1 dag sedan" : "$days dagar sedan";
    } else if ($weeks <= 4.3) {
        return ($weeks == 1) ? "1 vecka sedan" : "$weeks veckor sedan";
    } else if ($months <= 12) {
        return ($months == 1) ? "1 månad sedan" : "$months månader sedan";
    } else {
        return ($years == 1) ? "1 år sedan" : "$years år sedan";
    }
}
?>

<script type="text/javascript">
$(document).ready(function() {
    // Mark all as read
    $('#markAllReadBtn').on('click', function() {
        $.ajax({
            url: '<?php echo base_url(); ?>notifications/mark_all_read',
            method: 'POST',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    location.reload();
                }
            }
        });
    });

    // Click on notification card
    $('.notification-card').on('click', function(e) {
        // Don't trigger if clicking delete button
        if ($(e.target).hasClass('delete-btn')) {
            return;
        }

        var notificationId = $(this).data('id');
        var carId = $(this).data('car-id');

        // Mark as read
        $.post('<?php echo base_url(); ?>notifications/mark_read', {
            notification_id: notificationId
        }, function() {
            // Redirect to car page if car_id exists
            if (carId) {
                window.location.href = '<?php echo base_url(); ?>car/' + carId;
            }
        });
    });

    // Delete notification
    $('.delete-btn').on('click', function(e) {
        e.stopPropagation();
        
        if (!confirm('Är du säker på att du vill radera denna notifikation?')) {
            return;
        }

        var notificationId = $(this).data('id');
        var $card = $(this).closest('.notification-card');

        $.post('<?php echo base_url(); ?>notifications/delete', {
            notification_id: notificationId
        }, function(response) {
            if (response.status === 'success') {
                $card.fadeOut(300, function() {
                    $(this).remove();
                    
                    // Check if no notifications left
                    if ($('.notification-card').length === 0) {
                        location.reload();
                    }
                });
            }
        }, 'json');
    });
});
</script>