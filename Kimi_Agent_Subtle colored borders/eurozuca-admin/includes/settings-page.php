<?php
/**
 * Página de configurações do plugin
 */
if (!defined('ABSPATH')) exit;
?>

<div class="wrap">
    <h1>Configurações do Eurozuca Admin</h1>
    
    <form method="post" action="options.php">
        <?php settings_fields('eurozuca_settings'); ?>
        <?php do_settings_sections('eurozuca_settings'); ?>
        
        <table class="form-table">
            <tr>
                <th scope="row">Modo de Depuração</th>
                <td>
                    <label>
                        <input type="checkbox" name="eurozuca_debug_mode" value="1" <?php checked(get_option('eurozuca_debug_mode'), 1); ?>>
                        Ativar modo de depuração
                    </label>
                    <p class="description">Mostra informações de debug no frontend</p>
                </td>
            </tr>
            <tr>
                <th scope="row">Carregar Fontes do Google</th>
                <td>
                    <label>
                        <input type="checkbox" name="eurozuca_load_google_fonts" value="1" <?php checked(get_option('eurozuca_load_google_fonts', 1), 1); ?>>
                        Carregar fontes do Google Fonts
                    </label>
                </td>
            </tr>
            <tr>
                <th scope="row">Carregar Font Awesome</th>
                <td>
                    <label>
                        <input type="checkbox" name="eurozuca_load_fontawesome" value="1" <?php checked(get_option('eurozuca_load_fontawesome', 1), 1); ?>>
                        Carregar ícones Font Awesome
                    </label>
                </td>
            </tr>
        </table>
        
        <?php submit_button(); ?>
    </form>
    
    <hr>
    
    <h2>Informações do Plugin</h2>
    <table class="form-table">
        <tr>
            <th>Versão</th>
            <td><?php echo EUROZUCA_ADMIN_VERSION; ?></td>
        </tr>
        <tr>
            <th>Diretório</th>
            <td><code><?php echo EUROZUCA_ADMIN_PLUGIN_DIR; ?></code></td>
        </tr>
        <tr>
            <th>Shortcodes</th>
            <td>
                <code>[eurozuca_site]</code> - Exibe o site completo<br>
                <code>[eurozuca_painel]</code> - Exibe o painel de administração
            </td>
        </tr>
    </table>
</div>
