<?php
defined( 'ABSPATH' ) || exit;


class WC_Settings_Tab_Meu_Plugin {


    public function __construct(){
        add_filter( 'woocommerce_settings_tabs_array', __CLASS__ . '::add_settings_tab', 50 );
        add_action( 'woocommerce_settings_tabs_settings_tab_meu_plugin', __CLASS__ . '::settings_tab' );
        add_action( 'woocommerce_update_options_settings_tab_meu_plugin', __CLASS__ . '::update_settings' );
    }


    /**
     * Adicione uma nova tab de configurações as tabs de configurações do WooCommerce.
     * @param  array   $settings_tabs   Um array com as tabs de configuração do WooCommerce e seus rótulos.
     * @return array   $settings_tabs   Um array com as tabs de configuração do WooCommerce e seus rótulos.
     */
    public static function add_settings_tab( $settings_tabs ) {
        $settings_tabs['settings_tab_meu_plugin'] = 'Meu Plugin';
        return $settings_tabs;
    }


    /**
     * Usa a API de campos de administração WooCommerce para configurações de saída por meio da função woocommerce_admin_fields()
     * @uses woocommerce_admin_fields()
     * @uses self::get_settings()
     */
    public static function settings_tab() {
        woocommerce_admin_fields( self::get_settings() );
    }


    /**
     * Usa a API de opções do WooCommerce para salvar as configurações por meio da função @see woocommerce_update_options ().
     * @uses woocommerce_update_options()
     * @uses self::get_settings()
     */
    public static function update_settings() {
        woocommerce_update_options( self::get_settings() );
    }


    /**
     * Trás as páginas do site para a criação do select de opções
     * @return array    Um array contendo todas as páginas e mais o primeiro item vazio e mais o item home
     */
    public static function get_pages(){
        // Páginas para select de páginas
        $all_pages = get_pages();
        
        // Adicionando primeiro item vazio e mais um item que seria home
        $pages = ['' => 'Selecione uma página', 'home' => 'Página home'];
        
        foreach ( $all_pages as $page ) {
            $pages[$page->ID] = $page->post_title;
        }

        return $pages;
    }


    /**
     * Opções da página passadas para a função woocommerce_admin_fields() do woocommerce
     * @return array    Um array com todas as configurações
     */
    public static function get_settings() {

        $settings = array(
            'section_title'   => array(
                'name'        => 'Configurações do grupo de opções',
                'type'        => 'title',
                'id'          => 'option__section_title',
                'desc'        => '',
            ),
            'form_option_01'  => array(
                'name'        => 'Label da opção 01',
                'type'        => 'text',
                'id'          => 'option_01',
                'desc'        => 'Descrição em text da opção',
                'desc_tip'    => 'Descrição em popup da opção',
                'css'         => 'width:300px;',
                'placeholder' => '',
                'default'     => ''
            ),
            'form_option_02'  => array(
                'name'        => 'Label da opção 02',
                'type'        => 'select',
                'id'          => 'option_02',
                'desc'        => '',
                'desc_tip'    => '',
                'options'     => [
                    'option_1' => 'Opção 01',
                    'option_2' => 'Opção 02',
                    'option_3' => 'Opção 03',
                ],
            ),
            'form_option_03'  => array(
                'name'        => 'Label da opção 03',
                'type'        => 'select',
                'id'          => 'option_03',
                'desc'        => '',
                'desc_tip'    => '',
                'options'     => self::get_pages(),
            ),
            'form_option_04'  => array(
                'name'        => 'Label da opção 04',
                'type'        => 'color',
                'id'          => 'option_04',
                'css'         => 'width:85px;',
                'desc'        => '',
                'desc_tip'    => '',
                'default'     => '#61CE70'
            ),
            'form_option_05'  => array(
                'name'        => 'Label da opção 05',
                'type'        => 'textarea',
                'id'          => 'option_05',
                'css'         => 'min-height:200px; padding: 10px;',
                'desc'        => '',
                'desc_tip'    => '',
                'placeholder' => 'Adicione seu texto aqui',
                'default'     => ''
            ),
            'section_end_01'     => array(
                 'type'       => 'sectionend',
                 'id'         => 'option__section_end_01'
            ),
            'section_title_02'   => array(
                'name'        => 'Segunda seção na página',
                'type'        => 'title',
                'id'          => 'option__section_title_02',
                'desc'        => '',
            ),
            'form_option_06'  => array(
                'name'        => 'Label da opção 06',
                'type'        => 'checkbox',
                'id'          => 'option_06',
                'css'         => '',
                'desc'        => 'Texto do checkbox',
                'desc_tip'    => 'Descrição em texto da opção checkbox',
                'default'     => 'yes',
                'style'       => 'margin-top: 10px;',
            ),
            'form_option_07'  => array(
                'name'        => 'Label da opção 07',
                'type'        => 'radio',
                'id'          => 'option_07',
                'css'         => '',
                'desc'        => '',
                'desc_tip'    => 'Descrição em popup da opção checkbox',
                'default'     => 'opcao_02',
                'options'     => [
                    'opcao_01' => 'opção 01',
                    'opcao_02' => 'opção 02'
                ],
            ),
            'section_end'     => array(
                 'type'       => 'sectionend',
                 'id'         => 'option__section_end'
            )
        );

        return apply_filters( 'wc_settings_tab_meu_plugin_settings', $settings );
    }

}
new WC_Settings_Tab_Meu_Plugin();