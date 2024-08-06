<?php 
namespace OpenBackup\Wrapper;

class AdminMenuPage{
	/**
	 * App Start Path - This file loads our entire admin page. 
	 *
	 * @var int
	 */
	protected $app_start_path;	

	/**
	 * Page Title - The text to be displayed in the title tags of the page when the menu is selected.
	 *
	 * @var string
	 */
	protected $page_title;
	
	/**
	 * Menu Title - The text to be used for the menu.
	 *
	 * @var string
	 */
	protected $menu_title;

	/**
	 * Capability - The capability required for this menu to be displayed to the user.
	 *
	 * @var string
	 */
	protected $capability;

	/**
	 * Menu Slug - The slug name to refer to this menu by. Should be unique for this menu page.
	 *
	 * @var string
	 */
	protected $menu_slug;

	/**
	 * Menu Slug - The slug name to refer to this menu by. Should be unique for this menu page.
	 *
	 * @var callable
	 */
	protected $callback = '';

	/**
	 * Icon Url - Dashicon name, base64 encoded svg or none so you can add it with CSS. 
	 *
	 * @var string
	 */
	protected $icon_url = '';

	/**
	 * Icon Url - Dashicon name, base64 encoded svg or none so you can add it with CSS. 
	 *
	 * @var int
	 */
	protected $possition = null;

	/**
	 * Constructor
	 * 
	 * @var mixed
	 * 
	 */

	public function __construct($app_start_path, $page_title, $menu_title, $capability, $menu_slug, $icon_url = '', $possition = null)
	{
		$this->app_start_path 	= $app_start_path;
		$this->page_title 		= $page_title;
		$this->menu_title 		= $menu_title;
		$this->capability 		= $capability;
		$this->menu_slug 		= $menu_slug;
		$this->callback 		= array($this, 'empty_callback');
		$this->icon_url 		= $icon_url;
		$this->possition 		= $possition;
		
		$this->register();
	}

	/**
	 * Register the add_menu_page() function.
	 */
	public function register(){
		add_action('admin_menu', array($this, 'add_menu_page'));
		add_action('admin_init', array($this, 'render'));
	}

	/**
	 * Wrapper for the WordPress function.
	 */
	public function add_menu_page(){
		add_menu_page(
			__($this->page_title, 'prism-backup-and-migration'),
			__($this->menu_title, 'prism-backup-and-migration'),
			$this->capability,
			$this->menu_slug,
			$this->callback,
			$this->icon_url,
			$this->possition
		);
	}

	/**
	 * Empty callback so it generates a proper admin menu slug based on admin.php?page=menu_slug
	 */
	public function empty_callback(){}

	/**
	 * Render the template
	 */
	public function render(){
		if(isset($_GET['page']) && $_GET['page'] == $this->menu_slug){
			require_once $this->app_start_path;
			exit;
		}
	}
	
}