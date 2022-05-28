<?php
/*
 *  Made by Samerton
 *  https://github.com/NamelessMC/Nameless/
 *  NamelessMC version 2.0.0
 *
 *  Delete user event listener for Core module
 */

class DeleteUserHook {

    public static function execute(array $params = []): void {
        if (isset($params['user_id']) && $params['user_id'] > 1) {
            $db = DB::getInstance();

            // Delete the user
            $db->delete('users', ['id', $params['user_id']]);

            // Groups
            $db->delete('users_groups', ['user_id', $params['user_id']]);

            // IP logs
            $db->delete('users_ips', ['user_id', $params['user_id']]);

            // Logs
            $db->delete('logs', ['user_id', $params['user_id']]);

            // Alerts
            $db->delete('alerts', ['user_id', $params['user_id']]);

            // Blocked users
            $db->delete('blocked_users', ['user_id', $params['user_id']]);
            $db->delete('blocked_users', ['user_blocked_id', $params['user_id']]);

            // Email errors
            $db->delete('email_errors', ['user_id', $params['user_id']]);

            // Friends
            $db->delete('friends', ['user_id', $params['user_id']]);
            $db->delete('friends', ['friend_id', $params['user_id']]);

            // Infractions
            $db->delete('infractions', ['punished', $params['user_id']]);
            $db->delete('infractions', ['staff', $params['user_id']]);

            // Private messages
            $db->delete('private_messages', ['author_id', $params['user_id']]);
            $db->delete('private_messages_replies', ['author_id', $params['user_id']]);
            $db->delete('private_messages_users', ['user_id', $params['user_id']]);

            // Reports
            $db->delete('reports', ['reporter_id', $params['user_id']]);
            $db->delete('reports_comments', ['commenter_id', $params['user_id']]);

            // User sessions
            $db->delete('users_admin_session', ['user_id', $params['user_id']]);
            $db->delete('users_session', ['user_id', $params['user_id']]);

            // Profile fields
            $db->delete('users_profile_fields', ['user_id', $params['user_id']]);

            // Username history
            $db->delete('users_username_history', ['user_id', $params['user_id']]);

            // Profile wall posts
            $db->delete('user_profile_wall_posts', ['user_id', $params['user_id']]);
            $db->delete('user_profile_wall_posts', ['author_id', $params['user_id']]);
            $db->delete('user_profile_wall_posts_reactions', ['user_id', $params['user_id']]);
            $db->delete('user_profile_wall_posts_replies', ['author_id', $params['user_id']]);

            // Oauth
            $db->delete('oauth_users', ['user_id', $params['user_id']]);

            // User Integrations
            $db->delete('users_integrations', ['user_id', $params['user_id']]);
        }
    }
}
