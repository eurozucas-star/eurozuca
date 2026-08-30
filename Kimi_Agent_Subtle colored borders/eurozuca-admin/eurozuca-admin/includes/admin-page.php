<?php
/**
 * Página principal do painel admin
 */
if (!defined('ABSPATH')) exit;
?>

<div class="eurozuca-admin-wrap">
    <!-- Header -->
    <div class="eurozuca-header">
        <div>
            <h1><i class="fas fa-cog"></i> Eurozuca Painel de Controle</h1>
            <p>Personalize cores, fontes, templates e conteúdo do seu site</p>
        </div>
        <div>
            <button class="eurozuca-btn eurozuca-btn-primary" id="eurozuca-save">
                <i class="fas fa-save"></i> Salvar Alterações
            </button>
            <button class="eurozuca-btn eurozuca-btn-outline" id="eurozuca-reset">
                <i class="fas fa-undo"></i> Resetar
            </button>
        </div>
    </div>

    <!-- Tabs -->
    <div class="eurozuca-tabs">
        <button class="eurozuca-tab active" data-tab="tab-dashboard">
            <i class="fas fa-home"></i> Dashboard
        </button>
        <button class="eurozuca-tab" data-tab="tab-cores">
            <i class="fas fa-palette"></i> Cores
        </button>
        <button class="eurozuca-tab" data-tab="tab-fontes">
            <i class="fas fa-font"></i> Fontes
        </button>
        <button class="eurozuca-tab" data-tab="tab-templates">
            <i class="fas fa-layer-group"></i> Templates
        </button>
        <button class="eurozuca-tab" data-tab="tab-conteudo">
            <i class="fas fa-edit"></i> Conteúdo
        </button>
        <button class="eurozuca-tab" data-tab="tab-seo">
            <i class="fas fa-search"></i> SEO
        </button>
        <button class="eurozuca-tab" data-tab="tab-exportar">
            <i class="fas fa-download"></i> Exportar
        </button>
    </div>

    <!-- Dashboard -->
    <div id="tab-dashboard" class="eurozuca-tab-content active">
        <div class="eurozuca-stats">
            <div class="eurozuca-stat-card">
                <i class="fas fa-palette" style="color: #00a651;"></i>
                <h3>7</h3>
                <p>Cores configuráveis</p>
            </div>
            <div class="eurozuca-stat-card">
                <i class="fas fa-font" style="color: #d4af37;"></i>
                <h3>2</h3>
                <p>Fontes personalizáveis</p>
            </div>
            <div class="eurozuca-stat-card">
                <i class="fas fa-layer-group" style="color: #003399;"></i>
                <h3>6</h3>
                <p>Templates disponíveis</p>
            </div>
            <div class="eurozuca-stat-card">
                <i class="fas fa-file-alt" style="color: #6366f1;"></i>
                <h3>∞</h3>
                <p>Conteúdo editável</p>
            </div>
        </div>

        <div class="eurozuca-grid-2">
            <div class="eurozuca-card">
                <div class="eurozuca-card-header">
                    <h3 class="eurozuca-card-title"><i class="fas fa-rocket"></i> Acesso Rápido</h3>
                </div>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px;">
                    <button class="eurozuca-btn eurozuca-btn-outline" onclick="$('.eurozuca-tab[data-tab=tab-cores]').click();">
                        <i class="fas fa-palette"></i> Editar Cores
                    </button>
                    <button class="eurozuca-btn eurozuca-btn-outline" onclick="$('.eurozuca-tab[data-tab=tab-fontes]').click();">
                        <i class="fas fa-font"></i> Editar Fontes
                    </button>
                    <button class="eurozuca-btn eurozuca-btn-outline" onclick="$('.eurozuca-tab[data-tab=tab-templates]').click();">
                        <i class="fas fa-layer-group"></i> Mudar Template
                    </button>
                    <button class="eurozuca-btn eurozuca-btn-outline" onclick="$('.eurozuca-tab[data-tab=tab-conteudo]').click();">
                        <i class="fas fa-edit"></i> Editar Conteúdo
                    </button>
                </div>
            </div>

            <div class="eurozuca-card">
                <div class="eurozuca-card-header">
                    <h3 class="eurozuca-card-title"><i class="fas fa-info-circle"></i> Como Usar</h3>
                </div>
                <ol style="padding-left: 20px; line-height: 2;">
                    <li>Navegue pelas abas acima</li>
                    <li>Faça suas alterações</li>
                    <li>Clique em "Salvar Alterações"</li>
                    <li>Use o shortcode <code>[eurozuca_site]</code> em qualquer página</li>
                </ol>
            </div>
        </div>

        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-code"></i> Shortcodes Disponíveis</h3>
            </div>
            <div class="eurozuca-grid-2">
                <div>
                    <h4 style="margin-bottom: 10px;"><code>[eurozuca_site]</code></h4>
                    <p style="color: #6b7280;">Exibe o site completo com todas as configurações personalizadas.</p>
                </div>
                <div>
                    <h4 style="margin-bottom: 10px;"><code>[eurozuca_painel]</code></h4>
                    <p style="color: #6b7280;">Exibe apenas o painel de administração (para usuários logados).</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cores -->
    <div id="tab-cores" class="eurozuca-tab-content">
        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-palette"></i> Cores Principais (Tricolores)</h3>
            </div>
            <div class="eurozuca-color-group">
                <div class="eurozuca-color-item">
                    <label>Verde Principal</label>
                    <input type="color" class="eurozuca-form-control" id="color-green" value="#00a651">
                    <div class="eurozuca-color-preview" id="preview-green" style="background: #00a651;"></div>
                </div>
                <div class="eurozuca-color-item">
                    <label>Dourado/Amarelo</label>
                    <input type="color" class="eurozuca-form-control" id="color-gold" value="#d4af37">
                    <div class="eurozuca-color-preview" id="preview-gold" style="background: #d4af37;"></div>
                </div>
                <div class="eurozuca-color-item">
                    <label>Azul</label>
                    <input type="color" class="eurozuca-form-control" id="color-blue" value="#003399">
                    <div class="eurozuca-color-preview" id="preview-blue" style="background: #003399;"></div>
                </div>
            </div>
        </div>

        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-fill-drip"></i> Cores de Fundo</h3>
            </div>
            <div class="eurozuca-color-group">
                <div class="eurozuca-color-item">
                    <label>Fundo Principal</label>
                    <input type="color" class="eurozuca-form-control" id="color-bg" value="#ffffff">
                    <div class="eurozuca-color-preview" id="preview-bg" style="background: #ffffff;"></div>
                </div>
                <div class="eurozuca-color-item">
                    <label>Fundo Secundário</label>
                    <input type="color" class="eurozuca-form-control" id="color-bg-secondary" value="#f5f5f5">
                    <div class="eurozuca-color-preview" id="preview-bg-secondary" style="background: #f5f5f5;"></div>
                </div>
                <div class="eurozuca-color-item">
                    <label>Cor dos Cards</label>
                    <input type="color" class="eurozuca-form-control" id="color-card" value="#ffffff">
                    <div class="eurozuca-color-preview" id="preview-card" style="background: #ffffff;"></div>
                </div>
            </div>
        </div>

        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-font"></i> Cores de Texto</h3>
            </div>
            <div class="eurozuca-color-group">
                <div class="eurozuca-color-item">
                    <label>Texto Principal</label>
                    <input type="color" class="eurozuca-form-control" id="color-text" value="#1a1a1a">
                    <div class="eurozuca-color-preview" id="preview-text" style="background: #1a1a1a;"></div>
                </div>
                <div class="eurozuca-color-item">
                    <label>Texto Secundário</label>
                    <input type="color" class="eurozuca-form-control" id="color-text-secondary" value="#616161">
                    <div class="eurozuca-color-preview" id="preview-text-secondary" style="background: #616161;"></div>
                </div>
                <div class="eurozuca-color-item">
                    <label>Texto Muted</label>
                    <input type="color" class="eurozuca-form-control" id="color-text-muted" value="#9e9e9e">
                    <div class="eurozuca-color-preview" id="preview-text-muted" style="background: #9e9e9e;"></div>
                </div>
            </div>
        </div>

        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-border-style"></i> Opacidade das Bordas</h3>
            </div>
            <div class="eurozuca-form-group">
                <label>Opacidade das bordas tricolores <span>(0-100%)</span></label>
                <input type="range" class="eurozuca-form-control" id="border-opacity" min="0" max="100" value="50">
                <p style="text-align: center; margin-top: 10px; font-weight: 600; font-size: 18px;" id="opacity-value">50%</p>
            </div>
        </div>
    </div>

    <!-- Fontes -->
    <div id="tab-fontes" class="eurozuca-tab-content">
        <div class="eurozuca-grid-2">
            <div class="eurozuca-card">
                <div class="eurozuca-card-header">
                    <h3 class="eurozuca-card-title"><i class="fas fa-font"></i> Fonte Principal</h3>
                </div>
                <div class="eurozuca-form-group">
                    <label>Escolha a fonte principal</label>
                    <select class="eurozuca-form-control" id="font-primary">
                        <option value="Inter">Inter</option>
                        <option value="Roboto">Roboto</option>
                        <option value="Open Sans">Open Sans</option>
                        <option value="Lato">Lato</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Poppins">Poppins</option>
                        <option value="Nunito">Nunito</option>
                        <option value="Source Sans Pro">Source Sans Pro</option>
                    </select>
                </div>
                <div class="eurozuca-font-preview" id="font-primary-preview" style="font-family: 'Inter', sans-serif;">
                    <strong>Preview:</strong> Documentos & Serviços Portugal
                </div>
            </div>

            <div class="eurozuca-card">
                <div class="eurozuca-card-header">
                    <h3 class="eurozuca-card-title"><i class="fas fa-heading"></i> Fonte de Títulos</h3>
                </div>
                <div class="eurozuca-form-group">
                    <label>Escolha a fonte para títulos</label>
                    <select class="eurozuca-form-control" id="font-display">
                        <option value="Space Grotesk">Space Grotesk</option>
                        <option value="Inter">Inter</option>
                        <option value="Roboto">Roboto</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Poppins">Poppins</option>
                        <option value="Oswald">Oswald</option>
                        <option value="Raleway">Raleway</option>
                        <option value="Bebas Neue">Bebas Neue</option>
                    </select>
                </div>
                <div class="eurozuca-font-preview" id="font-display-preview" style="font-family: 'Space Grotesk', sans-serif;">
                    <strong>Preview:</strong> DOCUMENTOS & SERVIÇOS
                </div>
            </div>
        </div>

        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-text-height"></i> Tamanhos de Fonte</h3>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>Título Principal (Hero) <span>(em rem)</span></label>
                    <input type="number" class="eurozuca-form-control" id="font-size-hero" value="4" min="1" max="10" step="0.1">
                </div>
                <div class="eurozuca-form-group">
                    <label>Título de Seção <span>(em rem)</span></label>
                    <input type="number" class="eurozuca-form-control" id="font-size-section" value="2.5" min="1" max="5" step="0.1">
                </div>
                <div class="eurozuca-form-group">
                    <label>Texto Normal <span>(em rem)</span></label>
                    <input type="number" class="eurozuca-form-control" id="font-size-normal" value="1" min="0.5" max="2" step="0.1">
                </div>
                <div class="eurozuca-form-group">
                    <label>Texto Pequeno <span>(em rem)</span></label>
                    <input type="number" class="eurozuca-form-control" id="font-size-small" value="0.9" min="0.5" max="1.5" step="0.1">
                </div>
            </div>
        </div>
    </div>

    <!-- Templates -->
    <div id="tab-templates" class="eurozuca-tab-content">
        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-layer-group"></i> Escolha um Template</h3>
            </div>
            <div class="eurozuca-template-grid">
                <div class="eurozuca-template-card selected" data-template="default">
                    <div class="eurozuca-template-preview" style="background: linear-gradient(135deg, #00a651, #d4af37, #003399);">
                        <i class="fas fa-check-circle" style="color: white;"></i>
                    </div>
                    <h4>Padrão Tricolor</h4>
                    <p>Verde, Dourado e Azul</p>
                </div>

                <div class="eurozuca-template-card" data-template="modern">
                    <div class="eurozuca-template-preview" style="background: linear-gradient(135deg, #6366f1, #8b5cf6, #ec4899);">
                        <i class="fas fa-rocket" style="color: white;"></i>
                    </div>
                    <h4>Moderno</h4>
                    <p>Roxo e Rosa</p>
                </div>

                <div class="eurozuca-template-card" data-template="dark">
                    <div class="eurozuca-template-preview" style="background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);">
                        <i class="fas fa-moon" style="color: white;"></i>
                    </div>
                    <h4>Dark Mode</h4>
                    <p>Tema Escuro</p>
                </div>

                <div class="eurozuca-template-card" data-template="minimal">
                    <div class="eurozuca-template-preview" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef, #dee2e6);">
                        <i class="fas fa-minus" style="color: #495057;"></i>
                    </div>
                    <h4>Minimalista</h4>
                    <p>Cores Neutras</p>
                </div>

                <div class="eurozuca-template-card" data-template="ocean">
                    <div class="eurozuca-template-preview" style="background: linear-gradient(135deg, #0077b6, #00b4d8, #90e0ef);">
                        <i class="fas fa-water" style="color: white;"></i>
                    </div>
                    <h4>Oceano</h4>
                    <p>Tons de Azul</p>
                </div>

                <div class="eurozuca-template-card" data-template="sunset">
                    <div class="eurozuca-template-preview" style="background: linear-gradient(135deg, #f77f00, #fcbf49, #eae2b7);">
                        <i class="fas fa-sun" style="color: white;"></i>
                    </div>
                    <h4>Pôr do Sol</h4>
                    <p>Laranja e Amarelo</p>
                </div>
            </div>
        </div>

        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-cogs"></i> Configurações do Layout</h3>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>Bordas Arredondadas <span>(em px)</span></label>
                    <input type="number" class="eurozuca-form-control" id="border-radius" value="20" min="0" max="50">
                </div>
                <div class="eurozuca-form-group">
                    <label>Espaçamento entre Cards <span>(em rem)</span></label>
                    <input type="number" class="eurozuca-form-control" id="card-gap" value="1.5" min="0.5" max="5" step="0.5">
                </div>
                <div class="eurozuca-form-group">
                    <label>Sombra dos Cards</label>
                    <select class="eurozuca-form-control" id="card-shadow">
                        <option value="none">Nenhuma</option>
                        <option value="sm" selected>Pequena</option>
                        <option value="md">Média</option>
                        <option value="lg">Grande</option>
                    </select>
                </div>
                <div class="eurozuca-form-group">
                    <label>Animações</label>
                    <div class="eurozuca-toggle">
                        <label class="eurozuca-switch">
                            <input type="checkbox" id="enable-animations" checked>
                            <span class="eurozuca-slider"></span>
                        </label>
                        <span>Ativar animações</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Conteúdo -->
    <div id="tab-conteudo" class="eurozuca-tab-content">
        <!-- Hero Section -->
        <div class="eurozuca-section-editor">
            <div class="eurozuca-section-header">
                <h3 class="eurozuca-section-title"><i class="fas fa-star"></i> Seção Hero (Início)</h3>
                <div class="eurozuca-toggle">
                    <label class="eurozuca-switch">
                        <input type="checkbox" id="hero-enabled" checked>
                        <span class="eurozuca-slider"></span>
                    </label>
                </div>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>Título Principal</label>
                    <input type="text" class="eurozuca-form-control" id="hero-title" value="Documentos & Serviços Portugal">
                </div>
                <div class="eurozuca-form-group">
                    <label>Texto Destacado <span>(parte colorida)</span></label>
                    <input type="text" class="eurozuca-form-control" id="hero-highlight" value="Portugal">
                </div>
            </div>
            <div class="eurozuca-form-group">
                <label>Subtítulo</label>
                <textarea class="eurozuca-form-control" id="hero-subtitle">Soluções integradas para imigrantes: documentação, contabilidade, mão de obra e consultoria imobiliária em um só lugar.</textarea>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>Texto do Botão Principal</label>
                    <input type="text" class="eurozuca-form-control" id="hero-btn-primary" value="Iniciar Conversa">
                </div>
                <div class="eurozuca-form-group">
                    <label>Texto do Botão Secundário</label>
                    <input type="text" class="eurozuca-form-control" id="hero-btn-secondary" value="Explorar Serviços">
                </div>
            </div>
            <div class="eurozuca-form-group">
                <label>Mensagem do Assistente Virtual</label>
                <textarea class="eurozuca-form-control" id="ai-message">Olá! 👋 Posso ajudar com NIF, NISS, Utente, contabilidade, mão de obra ou imóveis. O que você precisa?</textarea>
            </div>
        </div>

        <!-- Documentos Section -->
        <div class="eurozuca-section-editor">
            <div class="eurozuca-section-header">
                <h3 class="eurozuca-section-title"><i class="fas fa-file-alt"></i> Seção Documentos</h3>
                <div class="eurozuca-toggle">
                    <label class="eurozuca-switch">
                        <input type="checkbox" id="docs-enabled" checked>
                        <span class="eurozuca-slider"></span>
                    </label>
                </div>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>Título da Seção</label>
                    <input type="text" class="eurozuca-form-control" id="docs-title" value="Documentos Essenciais">
                </div>
                <div class="eurozuca-form-group">
                    <label>Subtítulo</label>
                    <input type="text" class="eurozuca-form-control" id="docs-subtitle" value="Base legal para sua vida em Portugal">
                </div>
            </div>

            <!-- NIF -->
            <div class="eurozuca-card" style="margin-top: 20px;">
                <h4 style="margin-bottom: 15px;"><i class="fas fa-file-invoice-dollar" style="color: #00a651;"></i> Card NIF</h4>
                <div class="eurozuca-form-group">
                    <label>Título</label>
                    <input type="text" class="eurozuca-form-control" id="nif-title" value="NIF">
                </div>
                <div class="eurozuca-form-group">
                    <label>Descrição</label>
                    <textarea class="eurozuca-form-control" id="nif-desc">Número de Identificação Fiscal obrigatório para trabalhar, contratos e obrigações tributárias.</textarea>
                </div>
                <div class="eurozuca-form-group">
                    <label>Itens da Lista <span>(um por linha)</span></label>
                    <textarea class="eurozuca-form-control" id="nif-items" rows="3">Agendamento: 217 206 707
Documentos: Passaporte + morada
Gratuito no Portal das Finanças</textarea>
                </div>
            </div>

            <!-- NISS -->
            <div class="eurozuca-card" style="margin-top: 20px;">
                <h4 style="margin-bottom: 15px;"><i class="fas fa-shield-alt" style="color: #d4af37;"></i> Card NISS</h4>
                <div class="eurozuca-form-group">
                    <label>Título</label>
                    <input type="text" class="eurozuca-form-control" id="niss-title" value="NISS">
                </div>
                <div class="eurozuca-form-group">
                    <label>Descrição</label>
                    <textarea class="eurozuca-form-control" id="niss-desc">Número da Segurança Social para acesso a direitos e cumprimento de deveres contributivos.</textarea>
                </div>
                <div class="eurozuca-form-group">
                    <label>Itens da Lista <span>(um por linha)</span></label>
                    <textarea class="eurozuca-form-control" id="niss-items" rows="3">Pedido 100% online
NISS na Hora disponível
Tel: 210 548 888</textarea>
                </div>
            </div>

            <!-- SNS -->
            <div class="eurozuca-card" style="margin-top: 20px;">
                <h4 style="margin-bottom: 15px;"><i class="fas fa-heartbeat" style="color: #003399;"></i> Card SNS Utente</h4>
                <div class="eurozuca-form-group">
                    <label>Título</label>
                    <input type="text" class="eurozuca-form-control" id="sns-title" value="SNS Utente">
                </div>
                <div class="eurozuca-form-group">
                    <label>Descrição</label>
                    <textarea class="eurozuca-form-control" id="sns-desc">Acesso ao Serviço Nacional de Saúde com taxas reduzidas em consultas e medicamentos.</textarea>
                </div>
                <div class="eurozuca-form-group">
                    <label>Itens da Lista <span>(um por linha)</span></label>
                    <textarea class="eurozuca-form-control" id="sns-items" rows="3">Centro de Saúde da sua área
App SNS 24 disponível
PB4 para brasileiros</textarea>
                </div>
            </div>
        </div>

        <!-- Serviços Section -->
        <div class="eurozuca-section-editor">
            <div class="eurozuca-section-header">
                <h3 class="eurozuca-section-title"><i class="fas fa-briefcase"></i> Seção Serviços</h3>
                <div class="eurozuca-toggle">
                    <label class="eurozuca-switch">
                        <input type="checkbox" id="services-enabled" checked>
                        <span class="eurozuca-slider"></span>
                    </label>
                </div>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>Título da Seção</label>
                    <input type="text" class="eurozuca-form-control" id="services-title" value="Nossos Serviços">
                </div>
                <div class="eurozuca-form-group">
                    <label>Subtítulo</label>
                    <input type="text" class="eurozuca-form-control" id="services-subtitle" value="Soluções completas para você">
                </div>
            </div>

            <!-- Contabilidade -->
            <div class="eurozuca-card" style="margin-top: 20px;">
                <h4 style="margin-bottom: 15px;"><i class="fas fa-calculator"></i> Contabilidade</h4>
                <div class="eurozuca-form-group">
                    <label>Descrição</label>
                    <textarea class="eurozuca-form-control" id="accounting-desc">Gestão fiscal completa para trabalhadores independentes e empresas.</textarea>
                </div>
                <div class="eurozuca-form-group">
                    <label>Serviços <span>(um por linha)</span></label>
                    <textarea class="eurozuca-form-control" id="accounting-items" rows="4">Abertura de atividade
Declarações IRS/IVA
Faturação eletrônica
Representação fiscal</textarea>
                </div>
            </div>

            <!-- Mão de Obra -->
            <div class="eurozuca-card" style="margin-top: 20px;">
                <h4 style="margin-bottom: 15px;"><i class="fas fa-hard-hat"></i> Mão de Obra</h4>
                <div class="eurozuca-form-group">
                    <label>Descrição</label>
                    <textarea class="eurozuca-form-control" id="labor-desc">Recrutamento e prestação de serviços para diversos setores.</textarea>
                </div>
                <div class="eurozuca-form-group">
                    <label>Serviços <span>(um por linha)</span></label>
                    <textarea class="eurozuca-form-control" id="labor-items" rows="4">Construção civil
Serviços domésticos
Jardinagem e manutenção
Regularização de trabalhadores</textarea>
                </div>
            </div>

            <!-- Imóveis -->
            <div class="eurozuca-card" style="margin-top: 20px;">
                <h4 style="margin-bottom: 15px;"><i class="fas fa-home"></i> Imóveis</h4>
                <div class="eurozuca-form-group">
                    <label>Descrição</label>
                    <textarea class="eurozuca-form-control" id="realestate-desc">Consultoria completa para arrendamento e compra de imóveis.</textarea>
                </div>
                <div class="eurozuca-form-group">
                    <label>Serviços <span>(um por linha)</span></label>
                    <textarea class="eurozuca-form-control" id="realestate-items" rows="4">Pesquisa de imóveis
Análise de contratos
Registo na Junta de Freguesia
Comprovativo de morada</textarea>
                </div>
            </div>
        </div>

        <!-- Contato Section -->
        <div class="eurozuca-section-editor">
            <div class="eurozuca-section-header">
                <h3 class="eurozuca-section-title"><i class="fas fa-address-card"></i> Seção Contato</h3>
                <div class="eurozuca-toggle">
                    <label class="eurozuca-switch">
                        <input type="checkbox" id="contact-enabled" checked>
                        <span class="eurozuca-slider"></span>
                    </label>
                </div>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>Título da Seção</label>
                    <input type="text" class="eurozuca-form-control" id="contact-title" value="Fale Conosco">
                </div>
                <div class="eurozuca-form-group">
                    <label>Subtítulo</label>
                    <input type="text" class="eurozuca-form-control" id="contact-subtitle" value="Canais de atendimento">
                </div>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>WhatsApp</label>
                    <input type="text" class="eurozuca-form-control" id="contact-whatsapp" value="+351 936 907 137">
                </div>
                <div class="eurozuca-form-group">
                    <label>E-mail</label>
                    <input type="email" class="eurozuca-form-control" id="contact-email" value="eurozucas@gmail.com">
                </div>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>Texto Atendimento</label>
                    <input type="text" class="eurozuca-form-control" id="contact-location" value="Portugal & Brasil">
                </div>
                <div class="eurozuca-form-group">
                    <label>Subtexto</label>
                    <input type="text" class="eurozuca-form-control" id="contact-subtext" value="100% Online">
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="eurozuca-section-editor">
            <div class="eurozuca-section-header">
                <h3 class="eurozuca-section-title"><i class="fas fa-shoe-prints"></i> Rodapé (Footer)</h3>
                <div class="eurozuca-toggle">
                    <label class="eurozuca-switch">
                        <input type="checkbox" id="footer-enabled" checked>
                        <span class="eurozuca-slider"></span>
                    </label>
                </div>
            </div>
            <div class="eurozuca-form-group">
                <label>Descrição da Empresa</label>
                <textarea class="eurozuca-form-control" id="footer-desc">Soluções integradas para imigrantes em Portugal desde 2020. Documentação, contabilidade, mão de obra e imóveis.</textarea>
            </div>
            <div class="eurozuca-form-group">
                <label>Texto de Copyright</label>
                <input type="text" class="eurozuca-form-control" id="footer-copyright" value="Todos direitos 2026 © eurozuca.com">
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>Facebook URL</label>
                    <input type="url" class="eurozuca-form-control" id="social-facebook" value="https://www.facebook.com/profile.php?id=100094639210572">
                </div>
                <div class="eurozuca-form-group">
                    <label>Instagram URL</label>
                    <input type="url" class="eurozuca-form-control" id="social-instagram" value="https://www.instagram.com/eurozuca/">
                </div>
            </div>
            <div class="eurozuca-grid-2">
                <div class="eurozuca-form-group">
                    <label>YouTube URL</label>
                    <input type="url" class="eurozuca-form-control" id="social-youtube" value="https://www.youtube.com/@eurozucas">
                </div>
                <div class="eurozuca-form-group">
                    <label>WhatsApp URL</label>
                    <input type="url" class="eurozuca-form-control" id="social-whatsapp" value="https://wa.me/351936907137">
                </div>
            </div>
        </div>
    </div>

    <!-- SEO -->
    <div id="tab-seo" class="eurozuca-tab-content">
        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-tags"></i> Meta Tags</h3>
            </div>
            <div class="eurozuca-form-group">
                <label>Título da Página <span>(title)</span></label>
                <input type="text" class="eurozuca-form-control" id="meta-title" value="eurozuca.com - Portugal 2026">
            </div>
            <div class="eurozuca-form-group">
                <label>Descrição <span>(meta description)</span></label>
                <textarea class="eurozuca-form-control" id="meta-description">Soluções integradas para imigrantes em Portugal. Documentação, contabilidade, mão de obra e imóveis.</textarea>
            </div>
            <div class="eurozuca-form-group">
                <label>Palavras-chave <span>(meta keywords, separadas por vírgula)</span></label>
                <input type="text" class="eurozuca-form-control" id="meta-keywords" value="Portugal, imigrantes, NIF, NISS, documentos, contabilidade, imóveis">
            </div>
            <div class="eurozuca-form-group">
                <label>Autor</label>
                <input type="text" class="eurozuca-form-control" id="meta-author" value="eurozuca.com">
            </div>
        </div>
    </div>

    <!-- Exportar -->
    <div id="tab-exportar" class="eurozuca-tab-content">
        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-code"></i> Gerar Código HTML</h3>
            </div>
            <p style="margin-bottom: 20px; color: #6b7280;">Clique no botão abaixo para gerar o código HTML completo do seu site com todas as configurações aplicadas.</p>
            <button class="eurozuca-btn eurozuca-btn-primary" id="eurozuca-export-html" style="margin-bottom: 20px;">
                <i class="fas fa-code"></i> Gerar Código
            </button>
            <div class="eurozuca-code-export" id="generated-code" style="display: none;">
                <pre id="code-content"></pre>
            </div>
        </div>

        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-download"></i> Download do Site</h3>
            </div>
            <p style="margin-bottom: 20px; color: #6b7280;">Baixe o arquivo HTML completo para hospedar em qualquer servidor.</p>
            <button class="eurozuca-btn eurozuca-btn-secondary" id="eurozuca-download">
                <i class="fas fa-download"></i> Baixar index.html
            </button>
        </div>

        <div class="eurozuca-card">
            <div class="eurozuca-card-header">
                <h3 class="eurozuca-card-title"><i class="fas fa-file-export"></i> Importar/Exportar Configuração</h3>
            </div>
            <div class="eurozuca-grid-2">
                <div>
                    <p style="margin-bottom: 15px; color: #6b7280;">Exporte suas configurações para usar em outro site.</p>
                    <button class="eurozuca-btn eurozuca-btn-outline" id="eurozuca-export-config">
                        <i class="fas fa-file-export"></i> Exportar Configuração (JSON)
                    </button>
                </div>
                <div>
                    <p style="margin-bottom: 15px; color: #6b7280;">Importe uma configuração salva anteriormente.</p>
                    <input type="file" class="eurozuca-form-control" id="eurozuca-import-file" accept=".json">
                </div>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div class="eurozuca-toast" id="eurozuca-toast">
        <i class="fas fa-check-circle"></i>
        <span id="eurozuca-toast-message">Configuração salva!</span>
    </div>
</div>
