<?php 

class Alumno extends CI_model{

	//FUNCION QUE TRAE TODOS LOS ALUMNOS
	public function getAlumno(){

		$query = $this->db->get('alumnos',10);

		return $query->result();
	}

	//FUNCION QUE INSERTA A LOS ALUMNOS PASANDOLE UN ARRAY CON TODOS LOS DATOS
	public function insertAlumno($alumno){
		if($this->db->insert('alumnos',$alumno)){
			return true;
		}else{
			return false;
		}
	}

	//FUNCION QUE TRAE UN ALUMNO ESPECIFICO POR MEDIO DEL ID
	public function traerAlumno($id){
		$this->db->where('id_alumno',$id);
		$query = $this->db->get('alumnos');

		return $query->row();
	}

	//FUNCION QUE ACTUALIZA UN ALUMNO USANDO SU ID Y PASANDO UN ARRAY CON LOS DATOS A ACTUALIZAR
	public function updateAlumno($id,$alumno){
		$this->db->where('id_alumno',$id);

		if($this->db->update('alumnos',$alumno)){
			return true;
		}else{
			return false;
		}
	}

	//FUNCION QUE ELIMINA UN ALUMNO USANDO EL ID
	public function deleteAlumno($id){
		$this->db->where('id_alumno',$id);
		if($this->db->delete('alumnos')){
			return true;
		}else{
			return false;
		}
	}

	public function setNews(){
		

		$alumno = array(
			'nombre_alumno' => $this->input->post('nombre'),
			'apellidos_alumno' => $this->input->post('apellido'),
			'matricula_alumno' => $this->input->post('matricula')
		);

		return $this->db->insert("alumnos",$alumno);
	}

	public function updateNews($id = null){
		# code...
		$alumno = array(
			'nombre_alumno' => $this->input->post('nombre_alumno'),
			'apellidos_alumno' => $this->input->post('apellidos_alumno'),
			'matricula_alumno' => $this->input->post('matricula_alumno')
		);
		$this->db->where('id_alumno',$this->input->post('id_alumno'));
		return $this->db->update('alumnos',$alumno);
	}

}

?>

