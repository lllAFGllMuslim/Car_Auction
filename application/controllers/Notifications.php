<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        // Load session library
        $this->load->library('session');
        
        // Check if user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect(base_url());
            return;
        }
        
        $this->load->model('Notification_model');
    }

    /**
     * Get unread notifications (AJAX)
     */
    public function get_unread() {
        $user_id = $this->session->userdata('user_id');
        $notifications = $this->Notification_model->get_unread_notifications($user_id);
        $count = $this->Notification_model->count_unread($user_id);
        
        echo json_encode(array(
            'status' => 'success',
            'count' => $count,
            'notifications' => $notifications
        ));
    }

    /**
     * Mark notification as read
     */
    public function mark_read() {
        $notification_id = $this->input->post('notification_id');
        $user_id = $this->session->userdata('user_id');
        
        $result = $this->Notification_model->mark_as_read($notification_id, $user_id);
        
        echo json_encode(array(
            'status' => $result ? 'success' : 'error'
        ));
    }

    /**
     * Mark all as read
     */
    public function mark_all_read() {
        $user_id = $this->session->userdata('user_id');
        $result = $this->Notification_model->mark_all_as_read($user_id);
        
        echo json_encode(array(
            'status' => $result ? 'success' : 'error'
        ));
    }

    /**
     * View all notifications page
     */
    public function index($page = 1) {
        $user_id = $this->session->userdata('user_id');
        
        $limit = 20;
        $offset = ($page - 1) * $limit;
        
        $data['notifications'] = $this->Notification_model->get_user_notifications($user_id, $limit, $offset);
        $data['unread_count'] = $this->Notification_model->count_unread($user_id);
        
        $this->load->view('header');
        $this->load->view('notifications/index', $data);
        $this->load->view('footer');
    }

    /**
     * Delete notification
     */
    public function delete() {
        $notification_id = $this->input->post('notification_id');
        $user_id = $this->session->userdata('user_id');
        
        $result = $this->Notification_model->delete_notification($notification_id, $user_id);
        
        echo json_encode(array(
            'status' => $result ? 'success' : 'error'
        ));
    }
}