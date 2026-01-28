<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Create a new notification
     */
    public function create_notification($data) {
        return $this->db->insert('notifications', $data);
    }

    /**
     * Get user's unread notifications
     */
    public function get_unread_notifications($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_read', 0);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('notifications');
        return $query->result_array();
    }

    /**
     * Get all user notifications with pagination
     */
    public function get_user_notifications($user_id, $limit = 20, $offset = 0) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit($limit, $offset);
        $query = $this->db->get('notifications');
        return $query->result_array();
    }

    /**
     * Count unread notifications
     */
    public function count_unread($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_read', 0);
        return $this->db->count_all_results('notifications');
    }

    /**
     * Mark notification as read
     */
    public function mark_as_read($notification_id, $user_id) {
        $this->db->where('id', $notification_id);
        $this->db->where('user_id', $user_id);
        return $this->db->update('notifications', array('is_read' => 1));
    }

    /**
     * Mark all as read
     */
    public function mark_all_as_read($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->update('notifications', array('is_read' => 1));
    }

    /**
     * Delete notification
     */
    public function delete_notification($notification_id, $user_id) {
        $this->db->where('id', $notification_id);
        $this->db->where('user_id', $user_id);
        return $this->db->delete('notifications');
    }
}