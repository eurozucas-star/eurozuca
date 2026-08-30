<?php
/**
 * Shortcode do painel de administração (para usuários logados)
 */
if (!defined('ABSPATH')) exit;

// Verificar se usuário está logado e tem permissão
if (!is_user_logged_in() || !current_user_can('manage_options')) {
    return '<p style="text-align: center; padding: 50px;"><i class="fas fa-lock"></i> Você precisa estar logado como administrador para ver este conteúdo.</p>';
}

// Redirecionar para o painel admin
wp_redirect(admin_url('admin.php?page=eurozuca-admin'));
exit;
