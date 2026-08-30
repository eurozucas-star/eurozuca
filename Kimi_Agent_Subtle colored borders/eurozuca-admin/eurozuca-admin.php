<?php
/**
 * Plugin Name: Eurozuca Admin Painel
 * Plugin URI: https://eurozuca.com
 * Description: Painel completo de administração para personalizar cores, fontes, templates e conteúdo do site eurozuca.com
 * Version: 1.0.0
 * Author: Eurozuca
 * Author URI: https://eurozuca.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: eurozuca-admin
 */

// Prevenir acesso direto
if (!defined('ABSPATH')) {
    exit;
}

// Definir constantes do plugin
define('EUROZUCA_ADMIN_VERSION', '1.0.0');
define('EUROZUCA_ADMIN_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('EUROZUCA_ADMIN_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Classe principal do plugin
 */
class Eurozuca_Admin_Painel {
    
    private static $instance = null;
    
    /**
     * Obter instância singleton
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Construtor
     */
    private function __construct() {
        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'frontend_scripts'));
        add_action('wp_ajax_eurozuca_save_config', array($this, 'ajax_save_config'));
        add_action('wp_ajax_eurozuca_get_config', array($this, 'ajax_get_config'));
        add_action('wp_ajax_eurozuca_export_html', array($this, 'ajax_export_html'));
        
        // Registrar shortcode
        add_shortcode('eurozuca_painel', array($this, 'render_painel_shortcode'));
        add_shortcode('eurozuca_site', array($this, 'render_site_shortcode'));
        
        // Ativar plugin
        register_activation_hook(__FILE__, array($this, 'activate'));
    }
    
    /**
     * Inicializar plugin
     */
    public function init() {
        // Registrar opções padrão
        if (false === get_option('eurozuca_config')) {
            $this->set_default_config();
        }
    }
    
    /**
     * Configuração padrão
     */
    private function set_default_config() {
        $default_config = array(
            'colors' => array(
                'green' => '#00a651',
                'gold' => '#d4af37',
                'blue' => '#003399',
                'bg' => '#ffffff',
                'bgSecondary' => '#f5f5f5',
                'card' => '#ffffff',
                'text' => '#1a1a1a',
                'textSecondary' => '#616161',
                'textMuted' => '#9e9e9e'
            ),
            'fonts' => array(
                'primary' => 'Inter',
                'display' => 'Space Grotesk',
                'sizes' => array(
                    'hero' => 4,
                    'section' => 2.5,
                    'normal' => 1,
                    'small' => 0.9
                )
            ),
            'template' => 'default',
            'layout' => array(
                'borderRadius' => 20,
                'cardGap' => 1.5,
                'cardShadow' => 'sm',
                'animations' => true
            ),
            'borderOpacity' => 50,
            'content' => array(
                'hero' => array(
                    'title' => 'Documentos & Serviços Portugal',
                    'highlight' => 'Portugal',
                    'subtitle' => 'Soluções integradas para imigrantes: documentação, contabilidade, mão de obra e consultoria imobiliária em um só lugar.',
                    'btnPrimary' => 'Iniciar Conversa',
                    'btnSecondary' => 'Explorar Serviços',
                    'aiMessage' => 'Olá! 👋 Posso ajudar com NIF, NISS, Utente, contabilidade, mão de obra ou imóveis. O que você precisa?'
                ),
                'docs' => array(
                    'title' => 'Documentos Essenciais',
                    'subtitle' => 'Base legal para sua vida em Portugal',
                    'nif' => array(
                        'title' => 'NIF',
                        'desc' => 'Número de Identificação Fiscal obrigatório para trabalhar, contratos e obrigações tributárias.',
                        'items' => array('Agendamento: 217 206 707', 'Documentos: Passaporte + morada', 'Gratuito no Portal das Finanças')
                    ),
                    'niss' => array(
                        'title' => 'NISS',
                        'desc' => 'Número da Segurança Social para acesso a direitos e cumprimento de deveres contributivos.',
                        'items' => array('Pedido 100% online', 'NISS na Hora disponível', 'Tel: 210 548 888')
                    ),
                    'sns' => array(
                        'title' => 'SNS Utente',
                        'desc' => 'Acesso ao Serviço Nacional de Saúde com taxas reduzidas em consultas e medicamentos.',
                        'items' => array('Centro de Saúde da sua área', 'App SNS 24 disponível', 'PB4 para brasileiros')
                    )
                ),
                'services' => array(
                    'title' => 'Nossos Serviços',
                    'subtitle' => 'Soluções completas para você',
                    'accounting' => array(
                        'title' => 'Contabilidade',
                        'desc' => 'Gestão fiscal completa para trabalhadores independentes e empresas.',
                        'items' => array('Abertura de atividade', 'Declarações IRS/IVA', 'Faturação eletrônica', 'Representação fiscal')
                    ),
                    'labor' => array(
                        'title' => 'Mão de Obra',
                        'desc' => 'Recrutamento e prestação de serviços para diversos setores.',
                        'items' => array('Construção civil', 'Serviços domésticos', 'Jardinagem e manutenção', 'Regularização de trabalhadores')
                    ),
                    'realestate' => array(
                        'title' => 'Imóveis',
                        'desc' => 'Consultoria completa para arrendamento e compra de imóveis.',
                        'items' => array('Pesquisa de imóveis', 'Análise de contratos', 'Registo na Junta de Freguesia', 'Comprovativo de morada')
                    )
                ),
                'contact' => array(
                    'title' => 'Fale Conosco',
                    'subtitle' => 'Canais de atendimento',
                    'whatsapp' => '+351 936 907 137',
                    'email' => 'eurozucas@gmail.com',
                    'location' => 'Portugal & Brasil',
                    'subtext' => '100% Online'
                ),
                'footer' => array(
                    'desc' => 'Soluções integradas para imigrantes em Portugal desde 2020. Documentação, contabilidade, mão de obra e imóveis.',
                    'copyright' => 'Todos direitos 2026 © eurozuca.com'
                )
            ),
            'social' => array(
                'facebook' => 'https://www.facebook.com/profile.php?id=100094639210572',
                'instagram' => 'https://www.instagram.com/eurozuca/',
                'youtube' => 'https://www.youtube.com/@eurozucas',
                'whatsapp' => 'https://wa.me/351936907137'
            ),
            'seo' => array(
                'title' => 'eurozuca.com - Portugal 2026',
                'description' => 'Soluções integradas para imigrantes em Portugal. Documentação, contabilidade, mão de obra e imóveis.',
                'keywords' => 'Portugal, imigrantes, NIF, NISS, documentos, contabilidade, imóveis',
                'author' => 'eurozuca.com'
            )
        );
        
        update_option('eurozuca_config', $default_config);
    }
    
    /**
     * Ativar plugin
     */
    public function activate() {
        $this->set_default_config();
    }
    
    /**
     * Adicionar menu no admin
     */
    public function add_admin_menu() {
        add_menu_page(
            'Eurozuca Painel',
            'Eurozuca',
            'manage_options',
            'eurozuca-admin',
            array($this, 'render_admin_page'),
            'dashicons-admin-customizer',
            30
        );
        
        add_submenu_page(
            'eurozuca-admin',
            'Painel de Controle',
            'Painel',
            'manage_options',
            'eurozuca-admin',
            array($this, 'render_admin_page')
        );
        
        add_submenu_page(
            'eurozuca-admin',
            'Configurações',
            'Configurações',
            'manage_options',
            'eurozuca-settings',
            array($this, 'render_settings_page')
        );
    }
    
    /**
     * Scripts do admin
     */
    public function admin_scripts($hook) {
        if (strpos($hook, 'eurozuca') === false) {
            return;
        }
        
        wp_enqueue_style(
            'eurozuca-admin-css',
            EUROZUCA_ADMIN_PLUGIN_URL . 'assets/css/admin.css',
            array(),
            EUROZUCA_ADMIN_VERSION
        );
        
        wp_enqueue_script(
            'eurozuca-admin-js',
            EUROZUCA_ADMIN_PLUGIN_URL . 'assets/js/admin.js',
            array('jquery'),
            EUROZUCA_ADMIN_VERSION,
            true
        );
        
        wp_localize_script('eurozuca-admin-js', 'eurozuca_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('eurozuca_nonce')
        ));
    }
    
    /**
     * Scripts do frontend
     */
    public function frontend_scripts() {
        wp_enqueue_style(
            'eurozuca-site-css',
            EUROZUCA_ADMIN_PLUGIN_URL . 'assets/css/site.css',
            array(),
            EUROZUCA_ADMIN_VERSION
        );
        
        // Carregar configurações inline
        $config = get_option('eurozuca_config');
        $custom_css = $this->generate_custom_css($config);
        wp_add_inline_style('eurozuca-site-css', $custom_css);
    }
    
    /**
     * Gerar CSS customizado
     */
    private function generate_custom_css($config) {
        $c = $config['colors'];
        $f = $config['fonts'];
        $l = $config['layout'];
        $bo = $config['borderOpacity'] / 100;
        
        $shadows = array(
            'none' => 'none',
            'sm' => '0 1px 3px rgba(0,0,0,0.08)',
            'md' => '0 4px 12px rgba(0,0,0,0.1)',
            'lg' => '0 8px 30px rgba(0,0,0,0.12)'
        );
        
        return ":root {
    --green-primary: {$c['green']};
    --gold-primary: {$c['gold']};
    --blue-primary: {$c['blue']};
    --white-bg: {$c['bg']};
    --gray-50: {$c['bgSecondary']};
    --text-primary: {$c['text']};
    --text-secondary: {$c['textSecondary']};
    --text-muted: {$c['textMuted']};
    --font-primary: '{$f['primary']}', sans-serif;
    --font-display: '{$f['display']}', sans-serif;
    --border-radius: {$l['borderRadius']}px;
    --card-gap: {$l['cardGap']}rem;
    --card-shadow: {$shadows[$l['cardShadow']]};
    --border-opacity: {$bo};
    --font-size-hero: {$f['sizes']['hero']}rem;
    --font-size-section: {$f['sizes']['section']}rem;
    --font-size-normal: {$f['sizes']['normal']}rem;
    --font-size-small: {$f['sizes']['small']}rem;
}";
    }
    
    /**
     * AJAX: Salvar configuração
     */
    public function ajax_save_config() {
        check_ajax_referer('eurozuca_nonce', 'nonce');
        
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Permissão negada');
        }
        
        $config = json_decode(stripslashes($_POST['config']), true);
        update_option('eurozuca_config', $config);
        
        wp_send_json_success('Configuração salva!');
    }
    
    /**
     * AJAX: Obter configuração
     */
    public function ajax_get_config() {
        check_ajax_referer('eurozuca_nonce', 'nonce');
        
        $config = get_option('eurozuca_config');
        wp_send_json_success($config);
    }
    
    /**
     * AJAX: Exportar HTML
     */
    public function ajax_export_html() {
        check_ajax_referer('eurozuca_nonce', 'nonce');
        
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Permissão negada');
        }
        
        $html = $this->generate_site_html();
        wp_send_json_success(array('html' => $html));
    }
    
    /**
     * Renderizar página admin
     */
    public function render_admin_page() {
        include EUROZUCA_ADMIN_PLUGIN_DIR . 'includes/admin-page.php';
    }
    
    /**
     * Renderizar página de configurações
     */
    public function render_settings_page() {
        include EUROZUCA_ADMIN_PLUGIN_DIR . 'includes/settings-page.php';
    }
    
    /**
     * Shortcode: [eurozuca_painel]
     */
    public function render_painel_shortcode($atts) {
        ob_start();
        include EUROZUCA_ADMIN_PLUGIN_DIR . 'includes/painel-shortcode.php';
        return ob_get_clean();
    }
    
    /**
     * Shortcode: [eurozuca_site]
     */
    public function render_site_shortcode($atts) {
        ob_start();
        include EUROZUCA_ADMIN_PLUGIN_DIR . 'includes/site-shortcode.php';
        return ob_get_clean();
    }
    
    /**
     * Gerar HTML completo do site
     */
    public function generate_site_html() {
        $config = get_option('eurozuca_config');
        ob_start();
        include EUROZUCA_ADMIN_PLUGIN_DIR . 'includes/site-template.php';
        return ob_get_clean();
    }
}

// Inicializar plugin
Eurozuca_Admin_Painel::get_instance();
