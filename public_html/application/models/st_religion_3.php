<?php defined('SYSPATH') OR die('No direct access allowed.');

class ST_Religion_3_Model extends Structure_Model
{
	public function init()
	{		
		$this -> setCurrentLevel(1);
		$this -> setParenttype('religion_3');
		$this -> setSupertype('religion_3');
		$this -> setMaxlevel(1);
		$this -> setIsbuyable(false);
		$this -> setIssellable(false);	
		$this -> setStorage(10000000);					
		$this -> setWikilink('En_US_Religious_Structure_level_3');				
	}
	

	// Funzione che costruisce i links comuni relativi alla struttura
	// @output: stringa contenente i links relativi a questa struttura
	public function build_common_links( $structure, $bonus )
	{
		
		$links = parent::build_common_links( $structure );
		
		$links .= kohana::lang('global.condition') . ': '
				. $structure -> display_condition( ) . '<br>';
		
		// Azioni comuni accessibili a tutti i chars
		
		$links .= html::anchor( "/structure/info/" . $structure -> id, Kohana::lang('structures_actions.global_info'), array('class' => 'st_common_command')) . "<br/>";
		$links .= html::anchor( "/structure/donate/" . $structure -> id, Kohana::lang('structures_actions.global_deposit'), array('class' => 'st_common_command')) . "<br/>";$links .= html::anchor( "/structure/pray/" . $structure -> id, Kohana::lang('religion.pray'), array('class' => 'st_common_command')) ;		
		if ( $bonus !== false )
		{
		   	$links .= ' - '.html::anchor( "/structure/pray/".$structure->id."/2", 'x2',
		    array('title' => Kohana::lang('religion.pray').' (x2)', 'class' => 'st_common_command',
					'onclick' => 'return confirm(\''.kohana::lang('global.confirm_operation').'\')' ));
		    
		   	$links .= ' - '.html::anchor( "/structure/pray/".$structure->id."/3", 'x3',
		    array('title' => Kohana::lang('religion.pray').' (x3)', 'class' => 'st_common_command',
					'onclick' => 'return confirm(\''.kohana::lang('global.confirm_operation').'\')' ));
		}
		
		$links .= '<br/>';
		
		$links .= html::anchor( "/structure/damage/" . $structure -> id, Kohana::lang('ca_damage.damage'), array('class' => 'st_common_command')) ;		
		if ( $bonus !== false )
		{
		   	$links .= ' - '.html::anchor( "/structure/damage/".$structure->id."/2", 'x2',
		    array('title' => Kohana::lang('ca_damage.damage').' (x2)', 'class' => 'st_common_command',
					'onclick' => 'return confirm(\''.kohana::lang('global.confirm_operation').'\')' ));
		    
		   	$links .= ' - '.html::anchor( "/structure/damage/".$structure->id."/3", 'x3',
		    array('title' => Kohana::lang('ca_damage.damage').' (x3)', 'class' => 'st_common_command',
					'onclick' => 'return confirm(\''.kohana::lang('global.confirm_operation').'\')' ));
		}
		$links .= '<br/>';
		if ( $structure -> state < 100 )
		{
			
			$links .= html::anchor( "/structure/repair/" . $structure -> id, Kohana::lang('ca_repair.repair'), array('class' => 'st_common_command')) ;		
			if ( $bonus !== false )
			{
					$links .= ' - '.html::anchor( "/structure/repair/".$structure->id."/2", 'x2',
					array('title' => Kohana::lang('ca_repair.repair').' (x2)', 'class' => 'st_common_command',
						'onclick' => 'return confirm(\''.kohana::lang('global.confirm_operation').'\')' ));
					
					$links .= ' - '.html::anchor( "/structure/repair/".$structure->id."/3", 'x3',
					array('title' => Kohana::lang('ca_repair.repair').' (x3)', 'class' => 'st_common_command',
						'onclick' => 'return confirm(\''.kohana::lang('global.confirm_operation').'\')' ));
			}
		}		
		
		$links .= '<br/><br/>';
		
		return $links;
	}
	
	

	// Funzione che costruisce i links speciali relativi alla struttura
	// @output: stringa contenente i links relativi a questa struttura
	public function build_special_links( $structure)
	{
		// Azioni speciali accessibili solo al char che governa la struttura
		$links = '<br/>';
		$links .= parent::build_special_links( $structure );
		$links .= html::anchor( "/structure/rest/" . $structure -> id, Kohana::lang('structures_actions.rest'),
			array('title' => Kohana::lang('structures_actions.rest'), 'class' => 'st_special_command')). "<br/>";
			
		return $links;
	}
}
