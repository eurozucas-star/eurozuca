/**
 * Eurozuca Admin - JavaScript do Painel
 */

(function($) {
    'use strict';

    // Configuração atual
    let currentConfig = {};
    let isSaving = false;

    // Templates pré-definidos
    const templates = {
        'default': { green: '#00a651', gold: '#d4af37', blue: '#003399' },
        'modern': { green: '#6366f1', gold: '#8b5cf6', blue: '#ec4899' },
        'dark': { green: '#1a1a2e', gold: '#16213e', blue: '#0f3460' },
        'minimal': { green: '#f8f9fa', gold: '#e9ecef', blue: '#dee2e6' },
        'ocean': { green: '#0077b6', gold: '#00b4d8', blue: '#90e0ef' },
        'sunset': { green: '#f77f00', gold: '#fcbf49', blue: '#eae2b7' }
    };

    // Inicialização
    $(document).ready(function() {
        loadConfig();
        initTabs();
        initEventListeners();
    });

    // Carregar configuração
    function loadConfig() {
        $.ajax({
            url: eurozuca_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'eurozuca_get_config',
                nonce: eurozuca_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    currentConfig = response.data;
                    applyConfigToForm();
                }
            },
            error: function() {
                showToast('Erro ao carregar configuração', 'error');
            }
        });
    }

    // Aplicar configuração ao formulário
    function applyConfigToForm() {
        const c = currentConfig;

        // Cores
        if (c.colors) {
            $('#color-green').val(c.colors.green);
            $('#color-gold').val(c.colors.gold);
            $('#color-blue').val(c.colors.blue);
            $('#color-bg').val(c.colors.bg);
            $('#color-bg-secondary').val(c.colors.bgSecondary);
            $('#color-card').val(c.colors.card);
            $('#color-text').val(c.colors.text);
            $('#color-text-secondary').val(c.colors.textSecondary);
            $('#color-text-muted').val(c.colors.textMuted);

            Object.keys(c.colors).forEach(function(key) {
                updateColorPreview(key, c.colors[key]);
            });
        }

        // Fontes
        if (c.fonts) {
            $('#font-primary').val(c.fonts.primary);
            $('#font-display').val(c.fonts.display);
            if (c.fonts.sizes) {
                $('#font-size-hero').val(c.fonts.sizes.hero);
                $('#font-size-section').val(c.fonts.sizes.section);
                $('#font-size-normal').val(c.fonts.sizes.normal);
                $('#font-size-small').val(c.fonts.sizes.small);
            }
        }

        // Layout
        if (c.layout) {
            $('#border-radius').val(c.layout.borderRadius);
            $('#card-gap').val(c.layout.cardGap);
            $('#card-shadow').val(c.layout.cardShadow);
            $('#enable-animations').prop('checked', c.layout.animations);
        }

        // Border opacity
        if (c.borderOpacity) {
            $('#border-opacity').val(c.borderOpacity);
            $('#opacity-value').text(c.borderOpacity + '%');
        }

        // Conteúdo
        if (c.content) {
            applyContentToForm(c.content);
        }

        // SEO
        if (c.seo) {
            $('#meta-title').val(c.seo.title);
            $('#meta-description').val(c.seo.description);
            $('#meta-keywords').val(c.seo.keywords);
            $('#meta-author').val(c.seo.author);
        }

        // Social
        if (c.social) {
            $('#social-facebook').val(c.social.facebook);
            $('#social-instagram').val(c.social.instagram);
            $('#social-youtube').val(c.social.youtube);
            $('#social-whatsapp').val(c.social.whatsapp);
        }

        updateFontPreview();
    }

    // Aplicar conteúdo ao formulário
    function applyContentToForm(content) {
        // Hero
        if (content.hero) {
            $('#hero-title').val(content.hero.title);
            $('#hero-highlight').val(content.hero.highlight);
            $('#hero-subtitle').val(content.hero.subtitle);
            $('#hero-btn-primary').val(content.hero.btnPrimary);
            $('#hero-btn-secondary').val(content.hero.btnSecondary);
            $('#ai-message').val(content.hero.aiMessage);
        }

        // Documentos
        if (content.docs) {
            $('#docs-title').val(content.docs.title);
            $('#docs-subtitle').val(content.docs.subtitle);

            if (content.docs.nif) {
                $('#nif-title').val(content.docs.nif.title);
                $('#nif-desc').val(content.docs.nif.desc);
                $('#nif-items').val(content.docs.nif.items.join('\n'));
            }

            if (content.docs.niss) {
                $('#niss-title').val(content.docs.niss.title);
                $('#niss-desc').val(content.docs.niss.desc);
                $('#niss-items').val(content.docs.niss.items.join('\n'));
            }

            if (content.docs.sns) {
                $('#sns-title').val(content.docs.sns.title);
                $('#sns-desc').val(content.docs.sns.desc);
                $('#sns-items').val(content.docs.sns.items.join('\n'));
            }
        }

        // Serviços
        if (content.services) {
            $('#services-title').val(content.services.title);
            $('#services-subtitle').val(content.services.subtitle);

            if (content.services.accounting) {
                $('#accounting-desc').val(content.services.accounting.desc);
                $('#accounting-items').val(content.services.accounting.items.join('\n'));
            }

            if (content.services.labor) {
                $('#labor-desc').val(content.services.labor.desc);
                $('#labor-items').val(content.services.labor.items.join('\n'));
            }

            if (content.services.realestate) {
                $('#realestate-desc').val(content.services.realestate.desc);
                $('#realestate-items').val(content.services.realestate.items.join('\n'));
            }
        }

        // Contato
        if (content.contact) {
            $('#contact-title').val(content.contact.title);
            $('#contact-subtitle').val(content.contact.subtitle);
            $('#contact-whatsapp').val(content.contact.whatsapp);
            $('#contact-email').val(content.contact.email);
            $('#contact-location').val(content.contact.location);
            $('#contact-subtext').val(content.contact.subtext);
        }

        // Footer
        if (content.footer) {
            $('#footer-desc').val(content.footer.desc);
            $('#footer-copyright').val(content.footer.copyright);
        }
    }

    // Inicializar tabs
    function initTabs() {
        $('.eurozuca-tab').on('click', function() {
            const tabId = $(this).data('tab');

            $('.eurozuca-tab').removeClass('active');
            $(this).addClass('active');

            $('.eurozuca-tab-content').removeClass('active');
            $('#' + tabId).addClass('active');
        });
    }

    // Inicializar event listeners
    function initEventListeners() {
        // Color pickers
        $('input[type="color"]').on('input', function() {
            const colorName = $(this).attr('id').replace('color-', '');
            updateColorPreview(colorName, $(this).val());
        });

        // Font preview
        $('#font-primary, #font-display').on('change', updateFontPreview);

        // Range slider
        $('#border-opacity').on('input', function() {
            $('#opacity-value').text($(this).val() + '%');
        });

        // Template selection
        $('.eurozuca-template-card').on('click', function() {
            const template = $(this).data('template');
            selectTemplate($(this), template);
        });

        // Save button
        $('#eurozuca-save').on('click', saveConfig);

        // Reset button
        $('#eurozuca-reset').on('click', resetConfig);

        // Export HTML
        $('#eurozuca-export-html').on('click', exportHTML);

        // Download HTML
        $('#eurozuca-download').on('click', downloadHTML);

        // Export config
        $('#eurozuca-export-config').on('click', exportConfig);

        // Import config
        $('#eurozuca-import-file').on('change', importConfig);
    }

    // Atualizar preview de cor
    function updateColorPreview(colorName, value) {
        $('#preview-' + colorName).css('background', value);
    }

    // Atualizar preview de fonte
    function updateFontPreview() {
        const primaryFont = $('#font-primary').val();
        const displayFont = $('#font-display').val();

        $('#font-primary-preview').css('font-family', "'" + primaryFont + "', sans-serif");
        $('#font-display-preview').css('font-family', "'" + displayFont + "', sans-serif");
    }

    // Selecionar template
    function selectTemplate($element, templateName) {
        $('.eurozuca-template-card').removeClass('selected');
        $element.addClass('selected');
        currentConfig.template = templateName;

        if (templates[templateName]) {
            const t = templates[templateName];
            $('#color-green').val(t.green);
            $('#color-gold').val(t.gold);
            $('#color-blue').val(t.blue);
            updateColorPreview('green', t.green);
            updateColorPreview('gold', t.gold);
            updateColorPreview('blue', t.blue);
        }
    }

    // Coletar configuração do formulário
    function collectConfigFromForm() {
        return {
            colors: {
                green: $('#color-green').val(),
                gold: $('#color-gold').val(),
                blue: $('#color-blue').val(),
                bg: $('#color-bg').val(),
                bgSecondary: $('#color-bg-secondary').val(),
                card: $('#color-card').val(),
                text: $('#color-text').val(),
                textSecondary: $('#color-text-secondary').val(),
                textMuted: $('#color-text-muted').val()
            },
            fonts: {
                primary: $('#font-primary').val(),
                display: $('#font-display').val(),
                sizes: {
                    hero: parseFloat($('#font-size-hero').val()),
                    section: parseFloat($('#font-size-section').val()),
                    normal: parseFloat($('#font-size-normal').val()),
                    small: parseFloat($('#font-size-small').val())
                }
            },
            template: currentConfig.template || 'default',
            layout: {
                borderRadius: parseInt($('#border-radius').val()),
                cardGap: parseFloat($('#card-gap').val()),
                cardShadow: $('#card-shadow').val(),
                animations: $('#enable-animations').is(':checked')
            },
            borderOpacity: parseInt($('#border-opacity').val()),
            content: collectContentFromForm(),
            seo: {
                title: $('#meta-title').val(),
                description: $('#meta-description').val(),
                keywords: $('#meta-keywords').val(),
                author: $('#meta-author').val()
            },
            social: {
                facebook: $('#social-facebook').val(),
                instagram: $('#social-instagram').val(),
                youtube: $('#social-youtube').val(),
                whatsapp: $('#social-whatsapp').val()
            }
        };
    }

    // Coletar conteúdo do formulário
    function collectContentFromForm() {
        return {
            hero: {
                title: $('#hero-title').val(),
                highlight: $('#hero-highlight').val(),
                subtitle: $('#hero-subtitle').val(),
                btnPrimary: $('#hero-btn-primary').val(),
                btnSecondary: $('#hero-btn-secondary').val(),
                aiMessage: $('#ai-message').val()
            },
            docs: {
                title: $('#docs-title').val(),
                subtitle: $('#docs-subtitle').val(),
                nif: {
                    title: $('#nif-title').val(),
                    desc: $('#nif-desc').val(),
                    items: $('#nif-items').val().split('\n').filter(function(item) { return item.trim(); })
                },
                niss: {
                    title: $('#niss-title').val(),
                    desc: $('#niss-desc').val(),
                    items: $('#niss-items').val().split('\n').filter(function(item) { return item.trim(); })
                },
                sns: {
                    title: $('#sns-title').val(),
                    desc: $('#sns-desc').val(),
                    items: $('#sns-items').val().split('\n').filter(function(item) { return item.trim(); })
                }
            },
            services: {
                title: $('#services-title').val(),
                subtitle: $('#services-subtitle').val(),
                accounting: {
                    title: 'Contabilidade',
                    desc: $('#accounting-desc').val(),
                    items: $('#accounting-items').val().split('\n').filter(function(item) { return item.trim(); })
                },
                labor: {
                    title: 'Mão de Obra',
                    desc: $('#labor-desc').val(),
                    items: $('#labor-items').val().split('\n').filter(function(item) { return item.trim(); })
                },
                realestate: {
                    title: 'Imóveis',
                    desc: $('#realestate-desc').val(),
                    items: $('#realestate-items').val().split('\n').filter(function(item) { return item.trim(); })
                }
            },
            contact: {
                title: $('#contact-title').val(),
                subtitle: $('#contact-subtitle').val(),
                whatsapp: $('#contact-whatsapp').val(),
                email: $('#contact-email').val(),
                location: $('#contact-location').val(),
                subtext: $('#contact-subtext').val()
            },
            footer: {
                desc: $('#footer-desc').val(),
                copyright: $('#footer-copyright').val()
            }
        };
    }

    // Salvar configuração
    function saveConfig() {
        if (isSaving) return;

        isSaving = true;
        const $btn = $('#eurozuca-save');
        const originalText = $btn.html();
        $btn.html('<span class="eurozuca-loading"></span> Salvando...');

        currentConfig = collectConfigFromForm();

        $.ajax({
            url: eurozuca_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'eurozuca_save_config',
                nonce: eurozuca_ajax.nonce,
                config: JSON.stringify(currentConfig)
            },
            success: function(response) {
                if (response.success) {
                    showToast('Configuração salva com sucesso!', 'success');
                } else {
                    showToast('Erro ao salvar configuração', 'error');
                }
            },
            error: function() {
                showToast('Erro ao salvar configuração', 'error');
            },
            complete: function() {
                isSaving = false;
                $btn.html(originalText);
            }
        });
    }

    // Resetar configuração
    function resetConfig() {
        if (!confirm('Tem certeza que deseja resetar todas as configurações para o padrão?')) {
            return;
        }

        $.ajax({
            url: eurozuca_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'eurozuca_get_config',
                nonce: eurozuca_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    currentConfig = response.data;
                    applyConfigToForm();
                    showToast('Configuração resetada!', 'success');
                }
            }
        });
    }

    // Exportar HTML
    function exportHTML() {
        saveConfig();

        $.ajax({
            url: eurozuca_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'eurozuca_export_html',
                nonce: eurozuca_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    $('#generated-code').show();
                    $('#code-content').text(response.data.html.substring(0, 2000) + '...');
                    showToast('HTML gerado com sucesso!', 'success');
                }
            }
        });
    }

    // Download HTML
    function downloadHTML() {
        saveConfig();

        $.ajax({
            url: eurozuca_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'eurozuca_export_html',
                nonce: eurozuca_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    const blob = new Blob([response.data.html], { type: 'text/html' });
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'index.html';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    URL.revokeObjectURL(url);
                    showToast('Download iniciado!', 'success');
                }
            }
        });
    }

    // Exportar configuração
    function exportConfig() {
        saveConfig();

        const configJson = JSON.stringify(currentConfig, null, 2);
        const blob = new Blob([configJson], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = 'eurozuca-config.json';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        showToast('Configuração exportada!', 'success');
    }

    // Importar configuração
    function importConfig(input) {
        const file = input.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            try {
                const config = JSON.parse(e.target.result);
                currentConfig = config;
                applyConfigToForm();
                saveConfig();
                showToast('Configuração importada com sucesso!', 'success');
            } catch (err) {
                showToast('Erro ao importar configuração!', 'error');
            }
        };
        reader.readAsText(file);
    }

    // Mostrar toast
    function showToast(message, type) {
        const $toast = $('#eurozuca-toast');
        const $message = $('#eurozuca-toast-message');

        $toast.removeClass('success error').addClass(type);
        $message.text(message);
        $toast.addClass('show');

        setTimeout(function() {
            $toast.removeClass('show');
        }, 3000);
    }

})(jQuery);
