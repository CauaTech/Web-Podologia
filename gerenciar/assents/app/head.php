<?php 

$i = rand(1,75);
if ($i > 98) {
	include($flow.'assents/app/load.php');
}
#Importando Sistema de Segurança
include($flow.'assents/app/XWnDaMdznuRJ9NaDU3GD/import_sec_stack.php');

include($flow.'assents/app/connect.php');
session_start();


#Alert system
include($flow.'assents/app/alert.php');
#alert($classe,$MSG,COLORBACKGROUND,COLORTEXTO-WHITE/BLACK);?>

<!--Configuração Basico-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--Importando Logo da Pagina-->
<link rel="shortcut icon" href="<?php echo $flow;?>assents/img/logo/Logo.png">

<!--Importando Bootstrap Assents-->
<link rel="stylesheet" type="text/css" href="<?php echo $flow;?>assents/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $flow;?>assents/js/bootstrap.min.js">



<!--Jquery Icon FontAwesome-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/8c1cec9606.js" crossorigin="anonymous"></script>

<!--Importando Bootstrap Online-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!--ICON flaticon-->
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-straight/css/uicons-thin-straight.css'>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<link href="<?php echo $flow;?>assents/css/jquery.nice-number.css" rel="stylesheet">
<script src="<?php echo $flow;?>assents/js/jquery.nice-number.js"></script>



<?php 

function ConsultaHorario($horario,$data,$user){

			$connect = @mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Estamos com erro de conex«ªo ao banco de dados, tente novamente mais tarde');


			$sql_data = "SELECT * FROM `vortex-agenda` WHERE `agenda-horario`='$horario' && `agenda-user`='$user' && `agenda-data`='$data'";
			$consulta = $connect->query($sql_data);
			$info_agenda = $consulta->fetch_array();
			if ($info_agenda == null) {
				echo '<tr>
					        <td><a href="?type=0&data='.$data.'&horario='.$horario.'&agendaT='.$user.'" data-bs-toggle="tooltip" title="Bloquear Horario!"><i class="fa-regular fa-clock"></i></a></td>
					        <td>'.$horario.'</td>
					        <td></td>
					        <td></td>
					        <td>
					        </td>
					        <td><a class="btn btn-table" href="?agendar='.$user.'&data='.$data.'&horario='.$horario.'">Agendar</a></td>
					      </tr>';
			}
			elseif ($info_agenda['agenda-disponibilidade'] == 0) {
				echo '<tr class="table-danger">
					        <td><a href="?type=1&data='.$data.'&horario='.$horario.'&agendaT='.$user.'" data-bs-toggle="tooltip" title="Liberar Horario!"><i  class="fa-solid fa-lock"></i></a></td>
					        <td>'.$horario.'</td>
					        <td><label class="text-bloquear">Bloquear</label></td>
					        <td></td>
					        <td>
					        </td>
					        <td></td>
					      </tr>';
			}elseif ($info_agenda['agenda-disponibilidade'] == 1) {
				echo '<tr>
					        <td><a href="?type=0&data='.$data.'&horario='.$horario.'&agendaT='.$user.'" data-bs-toggle="tooltip" title="Bloquear Horario!"><i class="fa-regular fa-clock"></i></a></td>
					        <td>'.$horario.'</td>
					        <td></td>
					        <td></td>
					        <td>
					        </td>
					        <td><a class="btn btn-table" href="?agendar='.$user.'&data='.$data.'&horario='.$horario.'">Agendar</a></td>
					      </tr>';
			}elseif ($info_agenda['agenda-disponibilidade'] == 2) {
				$token_paciente = $info_agenda['agenda-paciente'];
				$sql_paciente = "SELECT * FROM `vortex-pacientes` WHERE `paciente_token`='$token_paciente'";
				$c_paciente = $connect->query($sql_paciente);
				$dados_info = $c_paciente->fetch_array();
				$procedimento_id = $info_agenda['agenda-procedimentos'];
				$id_procedimento = explode(",",$procedimento_id);
				if(isset($id_procedimento[0])){
					$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[0]'";
					$consult_name = $connect->query($proce_nome);
					$proce_info = $consult_name->fetch_array();
					$nome_proce01 = $proce_info['procedimentos'];
				}else{
					$nome_proce01 = " ";
				}
				if(isset($id_procedimento[1])){
					$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[1]'";
					$consult_name = $connect->query($proce_nome);
					$proce_info = $consult_name->fetch_array();
					$nome_proce02 = " - ".$proce_info['procedimentos'];
				}else{
					$nome_proce02 = " ";
				}
				if(isset($id_procedimento[2])){
					$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[2]'";
					$consult_name = $connect->query($proce_nome);
					$proce_info = $consult_name->fetch_array();
					$nome_proce03 = " - ".$proce_info['procedimentos'];
				}else{
					$nome_proce03 = " ";
				}
				if(isset($id_procedimento[3])){
					$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[3]'";
					$consult_name = $connect->query($proce_nome);
					$proce_info = $consult_name->fetch_array();
					$nome_proce04 = " - ".$proce_info['procedimentos'];
				}else{
					$nome_proce04 = " ";
				}
				if(isset($id_procedimento[4])){
					$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[4]'";
					$consult_name = $connect->query($proce_nome);
					$proce_info = $consult_name->fetch_array();
					$nome_proce05 = " - ".$proce_info['procedimentos'];
				}else{
					$nome_proce05 = "";
				}
				if(isset($id_procedimento[5])){
					$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[5]'";
					$consult_name = $connect->query($proce_nome);
					$proce_info = $consult_name->fetch_array();
					$nome_proce06 = " - ".$proce_info['procedimentos'];
				}else{
					$nome_proce06 = "";
				}
				if(isset($id_procedimento[6])){
					$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[6]'";
					$consult_name = $connect->query($proce_nome);
					$proce_info = $consult_name->fetch_array();
					$nome_proce07 = " - ".$proce_info['procedimentos'];
				}else{
					$nome_proce07 = "";
				}
				if(isset($id_procedimento[7])){
					$proce_nome = "SELECT * FROM `vortex-procedimentos` WHERE `id`='$id_procedimento[7]'";
					$consult_name = $connect->query($proce_nome);
					$proce_info = $consult_name->fetch_array();
					$nome_proce08 = " - ".$proce_info['procedimentos'];
				}else{
					$nome_proce08 = "";
				}
				if ($info_agenda['agenda-status'] == 1) {
					$color = "";
				}
				if ($info_agenda['agenda-status'] == 2) {
					$color = "table-success";
				}
				if ($info_agenda['agenda-status'] == 3) {
					$color = "table-warning";
				}
				if ($info_agenda['agenda-status'] == 4) {
					$color = "table-danger";
				}
				if ($info_agenda['agenda-status'] == 5) {
					$color = "table-danger";
				}
				echo '<tr class="'.$color.'">
					        <td></td>
					        <td>'.$horario.'</td>
					        <td><label>'.$dados_info['Nome'].'</label></td>
					        <td>'.$nome_proce01.$nome_proce02.$nome_proce03.$nome_proce04.$nome_proce05.$nome_proce06.$nome_proce07.$nome_proce08.'</td>
					        <td>
					        	<a href="?whats&data='.$data.'&horario='.$horario.'&telefone='.$dados_info['Telefone'].'&nome='.$dados_info['Nome'].'&agendaT='.$user.'" class="btn btn-table" data-bs-toggle="tooltip" title="Enviar Confirmação!"><i class="fi fi-brands-whatsapp"></i></a>
					        </td>
					        <td>
					        	<div class="dropdown">
						        	<button type="button" data-bs-toggle="dropdown" class="btn btn-table dropdown-toggle">Gerenciar</button>
						        	<ul class="dropdown-menu">
									    <li><a class="dropdown-item" href="?Desmarcar&nome_d='.$dados_info['Nome'].'&data='.$data.'&horario='.$horario.'&agendaT='.$user.'&id='.$info_agenda['id'].'"><i class="fa-solid fa-xmark"></i> Desmarcar</a></li>
									    <li><a class="dropdown-item" href="?remarcar&data='.$data.'&horario='.$horario.'&id='.$info_agenda['id'].'&agendaT='.$user.'"><i class="fa-solid fa-rotate-right"></i> Remarcar</a></li>
									    <li><a class="dropdown-item" href="../pacientes/anamnese/?token='.$dados_info['paciente_token'].'"><i class="fa-regular fa-clipboard"></i> Olhar Ficha</a></li>
									    <li><a class="dropdown-item" href="?status=2&id='.$info_agenda['id'].'&data='.$data.'&horario='.$horario.'&agendaT='.$user.'"><i class="fa-regular fa-thumbs-up"></i> Confirmar</a></li>
									    <li><a class="dropdown-item" href="?status=3&id='.$info_agenda['id'].'data='.$data.'&horario='.$horario.'&agendaT='.$user.'"><i class="fa-regular fa-hourglass"></i> Recepção</a></li>
									    <li><a class="dropdown-item" href="?status=4&id='.$info_agenda['id'].'data='.$data.'&horario='.$horario.'&agendaT='.$user.'"><i class="fa-regular fa-thumbs-down"></i> Falto</a></li>
									    <li><a class="dropdown-item" href="?vendaP&id='.$info_agenda['id'].'&agendaT='.$user.'"><i class="fa-solid fa-hand-holding-dollar"></i> Venda Personalizada</a></li>
								    </ul>
							    </div>
					        </td>
					      </tr>';
			}else{
				echo '<tr>
					        <td><a href="?type=0&data='.$data.'&horario='.$horario.'&agendaT='.$user.'" data-bs-toggle="tooltip" title="Bloquear Horario!"><i class="fa-regular fa-clock"></i></a></td>
					        <td>'.$horario.'</td>
					        <td></td>
					        <td></td>
					        <td>
					        </td>
					        <td><a class="btn btn-table" href="?agendar='.$user.'&data='.$data.'&horario='.$horario.'">Agendar</a></td>
					      </tr>';
			}
	}


?>


<?php 
if (isset($_GET['deslogar'])) {
 	session_destroy();
 	header('Location: '.$flow);
 } 
?>