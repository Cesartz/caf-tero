<?PHP
	class Productos_model extends CI_Model {
		private $aDatos;
		private $table = 'PRODUCTOS';
		
		public function initialize($aDatos = array())
		{
			$this->aDatos = $aDatos;
		}
		
		public function get($aDatos = FALSE, $nLimit = FALSE, $nP = FALSE){
			$this -> db -> start_cache();
			$this -> db -> from($this -> table);
			
			//////////ZONA DE FILTROS DE BÚSQUEDA
			if($aDatos){
				if(count($aDatos) > 0){
					if(isset($aDatos['Productos_txtSearch'])){
						if(!empty($aDatos['Productos_txtSearch']))
							$this->db->like("$this->table.TITULO", $aDatos['Productos_txtSearch']);
					}
					
					if(isset($aDatos['Productos_notId'])){
						if(!empty($aDatos['Productos_notId']))
							$this->db->where_not_in("$this->table.IDPRODUCTO", $aDatos['Productos_notId']);
					}

					if(isset($aDatos['Productos_searchCategoria'])){
						if(!empty($aDatos['Productos_searchCategoria']))
							$this->db->where("$this->table.CATEGORIA", $aDatos['Productos_searchCategoria']);
					}
					
					if(isset($aDatos['Productos_searchClasificacion'])){
						if(!empty($aDatos['Productos_searchClasificacion']))
							$this->db->where("$this->table.CLASIFICACION", $aDatos['Productos_searchClasificacion']);
					}
				}
			}
			//////////////////////////////////////////////////////////////////////////////////////////
			
			$this->db->order_by("$this->table.CREATED_AT", "DESC");
			
			$this -> db -> stop_cache();
			
			$totalResults = $this -> db -> count_all_results();
			
			if($nLimit || $nP)
				$this -> db -> limit($nLimit, $nP);
			
			$result = $this -> db -> get() -> result();
			
			$this -> db -> flush_cache();
			
			return array(
						'registros' => $result,
						'totalregistros' => $totalResults
					);
		}
		
		public function insert(){
			$this->db->set($this->aDatos)
					 ->insert($this->table);
			
			return $this->db->insert_id();
		}
		
		public function delete($nIdProducto){
			$this->db->delete($this->table, array("IDPRODUCTO" => $nIdProducto));
        	return $this->db->affected_rows();
		}
		
		public function find($nIdProducto){
			return $this -> db -> get_where($this->table, array('IDPRODUCTO' => $nIdProducto))
							   -> row();
		}

		public function findByTitle($cTitulo){
			return $this -> db -> get_where($this->table, array('TITULO' => $cTitulo))
							   -> row();
		}
		
		public function update($nIdProducto){
			return $this -> db -> set($this->aDatos)
							   -> where('IDPRODUCTO', $nIdProducto)
							   -> update($this->table);
		}
	}