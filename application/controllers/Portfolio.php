<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include MY_Controller

class Portfolio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		
		// Do it all over again for transactions
		// Get all tx from model
		$result = $this->transactions->byPlayer('Donald');
		
		// Build array of formatted cells
		foreach ($result as $myrow)
			$cells[] = $this->parser->parse('_transactionsCell', (array) $myrow, true);
			
		// prime the table class
		$this->load->library('table');
		$parms = array(
			'table_open' => '<table class="gallery">',
			'cell_start' => '<td class="homepageCell">',
			'cell_alt_start' => '<td class="homepageCell">'
		);
		$this->table->set_template($parms);
		
		// Generate table (finally)
		$rows = $this->table->make_columns($cells, 1);
		$this->data['thetable'] = $this->table->generate($rows);
		
		// Running this command more than once appends the additional data to page instead of overwriting  -BL
		//$this->parser->parse('justatable', $this->data);
		
		
		// Get all players from model
		$players = $this->players->get('Donald');
		
		// Build array of formatted cells
		foreach ($players as $playa)
			$cells[] = $this->parser->parse('_playerCell', (array) $playa, true);
			
		// prime the table class
		$this->load->library('table');
		$parms = array(
			'table_open' => '<table class="gallery">',
			'cell_start' => '<td class="homepageCell">',
			'cell_alt_start' => '<td class="homepageCell">'
		);
		$this->table->set_template($parms);
		
		// Generate table (finally)
		$rows = $this->table->make_columns($cells, 1);
		$this->data['thetable'] = $this->table->generate($rows);
		
		// Running this command more than once appends the additional data to page instead of overwriting  -BL
		$this->parser->parse('justatable', $this->data);

	}

}
