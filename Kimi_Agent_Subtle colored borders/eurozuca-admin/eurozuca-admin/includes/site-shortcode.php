<?php
/**
 * Template do site para o shortcode
 */
if (!defined('ABSPATH')) exit;

$config = get_option('eurozuca_config');
$c = $config['colors'];
$f = $config['fonts'];
$l = $config['layout'];
$content = $config['content'];
$social = $config['social'];
$seo = $config['seo'];

$border_opacity = $config['borderOpacity'] / 100;
$shadows = array(
    'none' => 'none',
    'sm' => '0 1px 3px rgba(0,0,0,0.08)',
    'md' => '0 4px 12px rgba(0,0,0,0.1)',
    'lg' => '0 8px 30px rgba(0,0,0,0.12)'
);
?>

<style>
.eurozuca-site {
    font-family: '<?php echo esc_attr($f['primary']); ?>', -apple-system, BlinkMacSystemFont, sans-serif;
    color: <?php echo esc_attr($c['text']); ?>;
    line-height: 1.6;
    -webkit-font-smoothing: antialiased;
}

.eurozuca-site * {
    box-sizing: border-box;
}

/* CSS Variables */
.eurozuca-site {
    --ez-green: <?php echo esc_attr($c['green']); ?>;
    --ez-gold: <?php echo esc_attr($c['gold']); ?>;
    --ez-blue: <?php echo esc_attr($c['blue']); ?>;
    --ez-bg: <?php echo esc_attr($c['bg']); ?>;
    --ez-bg-secondary: <?php echo esc_attr($c['bgSecondary']); ?>;
    --ez-card: <?php echo esc_attr($c['card']); ?>;
    --ez-text: <?php echo esc_attr($c['text']); ?>;
    --ez-text-secondary: <?php echo esc_attr($c['textSecondary']); ?>;
    --ez-text-muted: <?php echo esc_attr($c['textMuted']); ?>;
    --ez-radius: <?php echo esc_attr($l['borderRadius']); ?>px;
    --ez-gap: <?php echo esc_attr($l['cardGap']); ?>rem;
    --ez-shadow: <?php echo esc_attr($shadows[$l['cardShadow']]); ?>;
    --ez-border-opacity: <?php echo esc_attr($border_opacity); ?>;
}

/* Borda Tricolor */
.ez-border-tricolor {
    position: relative;
    border: 2px solid transparent;
    background-clip: padding-box;
}

.ez-border-tricolor::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    border-radius: calc(var(--ez-radius) + 2px);
    padding: 2px;
    background: linear-gradient(135deg, var(--ez-green) 0%, var(--ez-gold) 50%, var(--ez-blue) 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: var(--ez-border-opacity);
    pointer-events: none;
}

/* Hero Section */
.ez-hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 8rem 5% 4rem;
    background: linear-gradient(180deg, var(--ez-bg) 0%, var(--ez-bg-secondary) 100%);
}

.ez-hero-container {
    max-width: 1400px;
    margin: 0 auto;
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 4rem;
    align-items: center;
}

.ez-hero h1 {
    font-family: '<?php echo esc_attr($f['display']); ?>', sans-serif;
    font-size: <?php echo esc_attr($f['sizes']['hero']); ?>rem;
    font-weight: 700;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    color: var(--ez-text);
}

.ez-hero h1 span {
    color: var(--ez-green);
}

.ez-hero-subtitle {
    font-size: 1.25rem;
    color: var(--ez-text-secondary);
    margin-bottom: 2.5rem;
    max-width: 500px;
}

.ez-hero-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

/* Buttons */
.ez-btn {
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    cursor: pointer;
    font-size: 0.95rem;
    position: relative;
    background-clip: padding-box;
}

.ez-btn::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    border-radius: 50px;
    padding: 2px;
    background: linear-gradient(135deg, var(--ez-green) 0%, var(--ez-gold) 50%, var(--ez-blue) 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0.8;
    z-index: -1;
}

.ez-btn-primary {
    background: linear-gradient(135deg, var(--ez-green), #00c853);
    color: white;
}

.ez-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 166, 81, 0.3);
}

.ez-btn-outline {
    background: transparent;
    color: var(--ez-text);
}

.ez-btn-outline:hover {
    color: var(--ez-gold);
}

/* AI Panel */
.ez-ai-panel {
    background: var(--ez-card);
    border-radius: var(--ez-radius);
    overflow: hidden;
    box-shadow: var(--ez-shadow);
}

.ez-ai-header {
    padding: 1.5rem;
    border-bottom: 1px solid #e8e8e8;
    display: flex;
    align-items: center;
    gap: 1rem;
    background: var(--ez-bg-secondary);
}

.ez-ai-avatar {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--ez-green), #00c853);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.ez-ai-messages {
    height: 320px;
    overflow-y: auto;
    padding: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.ez-message {
    max-width: 85%;
    padding: 1rem 1.25rem;
    border-radius: 18px;
    font-size: 0.9rem;
    line-height: 1.6;
}

.ez-message.ai {
    background: rgba(0, 166, 81, 0.1);
    border: 1px solid rgba(0, 166, 81, 0.2);
    align-self: flex-start;
    border-bottom-left-radius: 4px;
}

/* Sections */
.ez-section {
    padding: 6rem 5%;
}

.ez-section-header {
    max-width: 1400px;
    margin: 0 auto 4rem;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.ez-section-title {
    font-family: '<?php echo esc_attr($f['display']); ?>', sans-serif;
    font-size: <?php echo esc_attr($f['sizes']['section']); ?>rem;
    font-weight: 700;
    color: var(--ez-text);
}

.ez-section-title span {
    color: var(--ez-green);
}

.ez-section-subtitle {
    color: var(--ez-text-secondary);
    margin-top: 0.5rem;
}

/* Cards Grid */
.ez-cards-grid {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--ez-gap);
}

.ez-card {
    background: var(--ez-card);
    border-radius: var(--ez-radius);
    padding: 2rem;
    transition: all 0.4s ease;
    box-shadow: var(--ez-shadow);
}

.ez-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.ez-card-icon {
    width: 56px;
    height: 56px;
    background: rgba(0, 166, 81, 0.1);
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--ez-green);
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
}

.ez-card h3 {
    font-family: '<?php echo esc_attr($f['display']); ?>', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.75rem;
}

.ez-card p {
    color: var(--ez-text-secondary);
    font-size: 0.9rem;
    line-height: 1.7;
    margin-bottom: 1.5rem;
}

.ez-card-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.ez-card-list li {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 0.5rem 0;
    font-size: 0.85rem;
    color: var(--ez-text-secondary);
    border-bottom: 1px solid #e8e8e8;
}

.ez-card-list li:last-child {
    border-bottom: none;
}

.ez-card-list li i {
    color: var(--ez-gold);
    font-size: 0.7rem;
    margin-top: 0.4rem;
}

/* Services Section */
.ez-services-section {
    background: var(--ez-bg-secondary);
}

/* Contact Grid */
.ez-contact-grid {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: var(--ez-gap);
}

.ez-contact-card {
    background: var(--ez-card);
    border-radius: var(--ez-radius);
    padding: 2.5rem;
    text-align: center;
    transition: all 0.3s;
    box-shadow: var(--ez-shadow);
}

.ez-contact-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.ez-contact-icon {
    width: 64px;
    height: 64px;
    background: rgba(212, 175, 55, 0.1);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: var(--ez-gold);
    font-size: 1.75rem;
}

.ez-contact-card h3 {
    font-family: '<?php echo esc_attr($f['display']); ?>', sans-serif;
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.ez-contact-card a {
    color: var(--ez-text-secondary);
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 500;
}

.ez-contact-card a:hover {
    color: var(--ez-green);
}

.ez-contact-card p {
    color: var(--ez-text-muted);
    font-size: 0.85rem;
    margin-top: 0.5rem;
}

/* CTA Section */
.ez-cta-section {
    text-align: center;
    padding: 8rem 5%;
    background: linear-gradient(180deg, var(--ez-bg-secondary) 0%, var(--ez-bg) 100%);
}

.ez-cta-box {
    max-width: 800px;
    margin: 0 auto;
    background: var(--ez-card);
    border-radius: var(--ez-radius);
    padding: 4rem;
    box-shadow: var(--ez-shadow);
}

.ez-cta-box h2 {
    font-family: '<?php echo esc_attr($f['display']); ?>', sans-serif;
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
}

.ez-cta-box p {
    color: var(--ez-text-secondary);
    font-size: 1.1rem;
    margin-bottom: 2.5rem;
}

/* Footer */
.ez-footer {
    border-top: 1px solid #e8e8e8;
    padding: 4rem 5% 2rem;
    background: var(--ez-bg-secondary);
}

.ez-footer-content {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 3rem;
    flex-wrap: wrap;
    gap: 2rem;
}

.ez-footer-brand {
    max-width: 300px;
}

.ez-footer-brand h3 {
    font-family: '<?php echo esc_attr($f['display']); ?>', sans-serif;
    font-size: 1.5rem;
    margin-bottom: 1rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.ez-footer-brand h3 i {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, var(--ez-green), var(--ez-gold));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.2rem;
}

.ez-footer-brand p {
    color: var(--ez-text-muted);
    font-size: 0.9rem;
    line-height: 1.7;
}

.ez-footer-links {
    display: flex;
    gap: 4rem;
    flex-wrap: wrap;
}

.ez-footer-column h4 {
    font-family: '<?php echo esc_attr($f['display']); ?>', sans-serif;
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 1.25rem;
}

.ez-footer-column a {
    display: block;
    color: var(--ez-text-muted);
    text-decoration: none;
    font-size: 0.85rem;
    padding: 0.4rem 0;
    transition: color 0.3s;
}

.ez-footer-column a:hover {
    color: var(--ez-green);
}

.ez-footer-bottom {
    max-width: 1400px;
    margin: 0 auto;
    padding-top: 2rem;
    border-top: 1px solid #e8e8e8;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.ez-footer-bottom p {
    color: var(--ez-text-muted);
    font-size: 0.8rem;
}

.ez-social-icons {
    display: flex;
    gap: 1rem;
}

.ez-social-icons a {
    width: 40px;
    height: 40px;
    background: var(--ez-card);
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--ez-text-secondary);
    text-decoration: none;
    transition: all 0.3s;
    box-shadow: var(--ez-shadow);
}

.ez-social-icons a:hover {
    background: var(--ez-gold);
    color: white;
    transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 1024px) {
    .ez-hero-container {
        grid-template-columns: 1fr;
    }
    
    .ez-hero h1 {
        font-size: 2.5rem;
    }
    
    .ez-cards-grid,
    .ez-contact-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 768px) {
    .ez-hero {
        padding: 6rem 5% 3rem;
    }
    
    .ez-hero h1 {
        font-size: 2rem;
    }
    
    .ez-cards-grid,
    .ez-contact-grid {
        grid-template-columns: 1fr;
    }
    
    .ez-section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
    
    .ez-cta-box {
        padding: 2.5rem 1.5rem;
    }
    
    .ez-cta-box h2 {
        font-size: 2rem;
    }
    
    .ez-footer-content {
        flex-direction: column;
    }
}
</style>

<div class="eurozuca-site">
    <!-- Hero Section -->
    <section class="ez-hero">
        <div class="ez-hero-container">
            <div class="ez-hero-content">
                <h1><?php echo esc_html($content['hero']['title']); ?> <span><?php echo esc_html($content['hero']['highlight']); ?></span></h1>
                <p class="ez-hero-subtitle"><?php echo esc_html($content['hero']['subtitle']); ?></p>
                <div class="ez-hero-buttons">
                    <a href="<?php echo esc_url($social['whatsapp']); ?>" class="ez-btn ez-btn-primary ez-border-tricolor" target="_blank">
                        <i class="fab fa-whatsapp"></i> <?php echo esc_html($content['hero']['btnPrimary']); ?>
                    </a>
                    <a href="#documentos" class="ez-btn ez-btn-outline ez-border-tricolor">
                        <?php echo esc_html($content['hero']['btnSecondary']); ?> <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="ez-ai-panel ez-border-tricolor">
                <div class="ez-ai-header">
                    <div class="ez-ai-avatar">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div>
                        <h3 style="margin: 0; font-size: 1.1rem;">Assistente Virtual</h3>
                        <p style="margin: 0; font-size: 0.8rem; color: var(--ez-text-muted);"><span style="color: var(--ez-green);">●</span> Online agora</p>
                    </div>
                </div>
                <div class="ez-ai-messages">
                    <div class="ez-message ai">
                        <strong>Olá! 👋</strong><br>
                        <?php echo esc_html($content['hero']['aiMessage']); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Documentos Section -->
    <section id="documentos" class="ez-section">
        <div class="ez-section-header">
            <div>
                <h2 class="ez-section-title"><?php echo esc_html($content['docs']['title']); ?> <span><?php echo esc_html(explode(' ', $content['docs']['title'])[1] ?? ''); ?></span></h2>
                <p class="ez-section-subtitle"><?php echo esc_html($content['docs']['subtitle']); ?></p>
            </div>
        </div>
        <div class="ez-cards-grid">
            <!-- NIF -->
            <div class="ez-card ez-border-tricolor">
                <div class="ez-card-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
                <h3><?php echo esc_html($content['docs']['nif']['title']); ?></h3>
                <p><?php echo esc_html($content['docs']['nif']['desc']); ?></p>
                <ul class="ez-card-list">
                    <?php foreach ($content['docs']['nif']['items'] as $item) : ?>
                        <li><i class="fas fa-chevron-right"></i> <?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- NISS -->
            <div class="ez-card ez-border-tricolor">
                <div class="ez-card-icon" style="background: rgba(212, 175, 55, 0.1); color: var(--ez-gold);">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3><?php echo esc_html($content['docs']['niss']['title']); ?></h3>
                <p><?php echo esc_html($content['docs']['niss']['desc']); ?></p>
                <ul class="ez-card-list">
                    <?php foreach ($content['docs']['niss']['items'] as $item) : ?>
                        <li><i class="fas fa-chevron-right"></i> <?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- SNS -->
            <div class="ez-card ez-border-tricolor">
                <div class="ez-card-icon" style="background: rgba(0, 51, 153, 0.1); color: var(--ez-blue);">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h3><?php echo esc_html($content['docs']['sns']['title']); ?></h3>
                <p><?php echo esc_html($content['docs']['sns']['desc']); ?></p>
                <ul class="ez-card-list">
                    <?php foreach ($content['docs']['sns']['items'] as $item) : ?>
                        <li><i class="fas fa-chevron-right"></i> <?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- Serviços Section -->
    <section id="servicos" class="ez-section ez-services-section">
        <div class="ez-section-header">
            <div>
                <h2 class="ez-section-title"><?php echo esc_html(explode(' ', $content['services']['title'])[0]); ?> <span><?php echo esc_html(explode(' ', $content['services']['title'])[1] ?? ''); ?></span></h2>
                <p class="ez-section-subtitle"><?php echo esc_html($content['services']['subtitle']); ?></p>
            </div>
        </div>
        <div class="ez-cards-grid">
            <!-- Contabilidade -->
            <div class="ez-card ez-border-tricolor">
                <div class="ez-card-icon" style="background: rgba(212, 175, 55, 0.1); color: var(--ez-gold);">
                    <i class="fas fa-calculator"></i>
                </div>
                <h3><?php echo esc_html($content['services']['accounting']['title']); ?></h3>
                <p><?php echo esc_html($content['services']['accounting']['desc']); ?></p>
                <ul class="ez-card-list">
                    <?php foreach ($content['services']['accounting']['items'] as $item) : ?>
                        <li><i class="fas fa-chevron-right"></i> <?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Mão de Obra -->
            <div class="ez-card ez-border-tricolor">
                <div class="ez-card-icon" style="background: rgba(212, 175, 55, 0.1); color: var(--ez-gold);">
                    <i class="fas fa-hard-hat"></i>
                </div>
                <h3><?php echo esc_html($content['services']['labor']['title']); ?></h3>
                <p><?php echo esc_html($content['services']['labor']['desc']); ?></p>
                <ul class="ez-card-list">
                    <?php foreach ($content['services']['labor']['items'] as $item) : ?>
                        <li><i class="fas fa-chevron-right"></i> <?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <!-- Imóveis -->
            <div class="ez-card ez-border-tricolor">
                <div class="ez-card-icon" style="background: rgba(212, 175, 55, 0.1); color: var(--ez-gold);">
                    <i class="fas fa-home"></i>
                </div>
                <h3><?php echo esc_html($content['services']['realestate']['title']); ?></h3>
                <p><?php echo esc_html($content['services']['realestate']['desc']); ?></p>
                <ul class="ez-card-list">
                    <?php foreach ($content['services']['realestate']['items'] as $item) : ?>
                        <li><i class="fas fa-chevron-right"></i> <?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="ez-cta-section">
        <div class="ez-cta-box ez-border-tricolor">
            <h2>Pronto para começar?</h2>
            <p>Entre em contato agora e receba atendimento personalizado em até 24 horas.</p>
            <a href="<?php echo esc_url($social['whatsapp']); ?>" class="ez-btn ez-btn-primary ez-border-tricolor" target="_blank" style="font-size: 1.1rem; padding: 1.25rem 2.5rem;">
                <i class="fab fa-whatsapp"></i> Falar no WhatsApp
            </a>
        </div>
    </section>

    <!-- Contato Section -->
    <section id="contato" class="ez-section">
        <div class="ez-section-header">
            <div>
                <h2 class="ez-section-title"><?php echo esc_html(explode(' ', $content['contact']['title'])[0]); ?> <span><?php echo esc_html(explode(' ', $content['contact']['title'])[1] ?? ''); ?></span></h2>
                <p class="ez-section-subtitle"><?php echo esc_html($content['contact']['subtitle']); ?></p>
            </div>
        </div>
        <div class="ez-contact-grid">
            <div class="ez-contact-card ez-border-tricolor">
                <div class="ez-contact-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h3>WhatsApp</h3>
                <a href="<?php echo esc_url($social['whatsapp']); ?>" target="_blank"><?php echo esc_html($content['contact']['whatsapp']); ?></a>
                <p>Resposta em minutos</p>
            </div>
            <div class="ez-contact-card ez-border-tricolor">
                <div class="ez-contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>E-mail</h3>
                <a href="mailto:<?php echo esc_attr($content['contact']['email']); ?>"><?php echo esc_html($content['contact']['email']); ?></a>
                <p>Resposta em 24h</p>
            </div>
            <div class="ez-contact-card ez-border-tricolor">
                <div class="ez-contact-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3>Atendimento</h3>
                <a href="#"><?php echo esc_html($content['contact']['location']); ?></a>
                <p><?php echo esc_html($content['contact']['subtext']); ?></p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="ez-footer">
        <div class="ez-footer-content">
            <div class="ez-footer-brand">
                <h3><i class="fas fa-compass"></i> eurozuca.com</h3>
                <p><?php echo esc_html($content['footer']['desc']); ?></p>
            </div>
            <div class="ez-footer-links">
                <div class="ez-footer-column">
                    <h4>Serviços</h4>
                    <a href="#documentos">Documentos</a>
                    <a href="#servicos">Contabilidade</a>
                    <a href="#servicos">Mão de Obra</a>
                    <a href="#servicos">Imóveis</a>
                </div>
                <div class="ez-footer-column">
                    <h4>Legal</h4>
                    <a href="#">Legislação</a>
                    <a href="#">Privacidade</a>
                    <a href="#">Termos</a>
                </div>
                <div class="ez-footer-column">
                    <h4>Contato</h4>
                    <a href="<?php echo esc_url($social['whatsapp']); ?>" target="_blank">WhatsApp</a>
                    <a href="mailto:<?php echo esc_attr($content['contact']['email']); ?>">E-mail</a>
                </div>
            </div>
        </div>
        <div class="ez-footer-bottom">
            <p><?php echo esc_html($content['footer']['copyright']); ?></p>
            <div class="ez-social-icons">
                <a href="<?php echo esc_url($social['facebook']); ?>" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="<?php echo esc_url($social['instagram']); ?>" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="<?php echo esc_url($social['youtube']); ?>" target="_blank" title="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="<?php echo esc_url($social['whatsapp']); ?>" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </footer>
</div>
