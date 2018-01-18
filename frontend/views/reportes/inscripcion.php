<?php
// Grados se amarró a código ya que en la tabla hay grados que no 
// están participando en este proceso. Es necesario adecuar el código
// en este sistema para excluir esos grados y lograr eliminar este código
// amarrado
$grados = array(
			'6' => '6to. Grado',
			'7' => '1er. Año',
			'8' => '2do. Año',
			'9' => '3er. Año',
			'10' => '4to. Año',
			'11' => '5to. Año',
			'12' => '6to. Año',
		  );
$nivelInstruccion = array(
			'1' => 'Primaria',
			'2' => 'Secundaria',
			'3' => 'Superior',
		  );
?>
		<table border="0" cellspacing="0" cellpadding="0" class="ta1" width="100%">
			<colgroup><col width="124"/>
			<col width="99"/>
			<col width="99"/>
			<col width="99"/>
			<col width="99"/>
			<col width="99"/>
			<col width="99"/>
			<col width="99"/>
			<col width="155"/>
			<col width="99"/>
			</colgroup>
			<tr class="ro1">
				<td colspan="9" style="text-align:center;width:2.831cm; " class="ce1">
					<p>PLANILLA DE SOLICITUD DE INSCRIPCION</p></td>
					<!-- <td style="text-align:center;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1"><td colspan="9" style="text-align:center;width:2.831cm; " class="ce1">
				<p>PROGRAMA DE FORTALECIMIENTO AL TALENTO Y LIDERAZGO ESTUDIANTIL</p></td>
				<!-- <td style="text-align:center;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td colspan="9" style="text-align:center;width:2.831cm; " class="ce1">
					<p>-FORTALENTO-</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
			</tr>
			<tr class="ro2"><td style="text-align:center;width:2.831cm; " class="ce2"> </td>
			<td style="text-align:center;width:2.258cm; " class="ce2"> </td>
			<td style="text-align:center;width:2.258cm; " class="ce2"> </td>
			<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
			<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
			<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
			<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
			<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
			<td style="text-align:left;width:3.54cm; " class="ce2"><br/> </td>
			<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro2">
				<td colspan="2" style="text-align:right;width:2.831cm; " class="ce3">
					<p>FECHA DE SOLICITUD:</p></td>
					<td colspan="2" style="text-align:left;width:2.258cm;" class="ce9">
						<p> &nbsp; <?= $inscripcion->fecha_inscripcion; ?></p></td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td colspan="2" style="text-align:right;width:2.258cm; " class="ce3">
						<p>Nº PLANILLA:</p></td>
					<td style="text-align:left;width:3.54cm; " class="ce26">
						&nbsp;<?= $inscripcion->id; ?> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce3"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce34"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce4"><p>LOCALIDAD:</p></td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce4"><p>MUNICIPIO:</p></td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td>-->
			</tr>
			<tr class="ro3">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce5">
					&nbsp;<?= $inscripcion->localidad_plantel; ?> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td colspan="4" style="text-align:left;width:2.258cm; " class="ce5">
					&nbsp;<?= $plantel->codMunicipio->municipio; ?> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro2">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce6">
					<p>Escriba en letra legible el nombre de la localidad en la que se encuentra ubicada la Unidad Educativa en la cual cursa estudios.</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td colspan="4" style="text-align:left;width:2.258cm; " class="ce6">
					<p>Escriba el nombre del municipio donde esta ubicada la Unidad Educativa en la cual cursa estudios.</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce2"><br/> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro2">
				<td colspan="9" style="text-align:center;width:2.831cm; " class="ce7">
					<p>DATOS DEL ESTUDIANTE</p>
				</td>
				<br/>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce8">
					<p>PRIMER APELLIDO E INICIAL DEL SEGUNDO:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td colspan="4" style="text-align:left;width:2.258cm; " class="ce4">
					<p>PRIMER NOMBRE E INICIAL DEL SEGUNDO:</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce2"> </td> -->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro3">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce9">
					&nbsp;<?= $inscripcion->idEstudiante->apellido; ?>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2"></td>
				<td colspan="4" style="text-align:left;width:2.258cm; " class="ce9">
					&nbsp;<?= $inscripcion->idEstudiante->nombre; ?>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce6">
					<p>Escriba el primer apellido e inicial del segundo</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td colspan="4" style="text-align:left;width:2.258cm; " class="ce6">
					<p>Escriba el primer nombre e inicial del segundo</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro4">
				<td style="text-align:left;width:2.831cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"><br/> </td>
				<td colspan="5" style="text-align:left;width:2.258cm; " class="ce36">
					<p>CORREO ELECTRÓNICO (dato obligatorio):</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td colspan="3" style="text-align:left;width:2.831cm; " class="ce4">
					<p>CEDULA DE IDENTIDAD:</p></td>
				<!-- <td style="text-align:left;width:2.258cm; " class="ce2"> </td> -->
				<td style="text-align:left;width:2.258cm; " class="ce30">
					<p>V <?= $inscripcion->idEstudiante->es_venezolano ? "<span><strong>[*]</strong></span>" : null?>
					    E <?= !($inscripcion->idEstudiante->es_venezolano) ? "<span><strong>[*]</strong></span>" : null?>
					</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				<td colspan="5" rowspan="2" style="text-align:left;width:2.258cm; " class="ce37"> 
					&nbsp;<?=$estudianteCorreo;?>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro5">
				<td colspan="3" style="text-align:left;width:2.831cm; " class="ce9">
					&nbsp;<?= $inscripcion->idEstudiante->cedula ?> 
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
			</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce10"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce31"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="Default"> </td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce4">
					<p>EDAD:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce4">
					<p>SEXO:</p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro2">
					<td colspan="2" style="text-align:left;width:2.831cm; " class="ce11">
						<p>FECHA DE NACIMIENTO:</p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="ce2"> </td> -->
					<td style="text-align:left;width:2.258cm; " class="ce26">
						<?php list($dia, $mes, $anio) = split('[/.-]', $inscripcion->idEstudiante->fecha_nacimiento);?>
						<p>Día: <?= $dia ?></p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce26">
						<p>Mes: <?= $mes ?></p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce38">
						<p>Año: <?= $anio ?></p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce26"><?= $inscripcion->getEdadEstudiante();?></td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
					<td style="text-align:left;width:3.54cm; " class="ce34">
						<p>FEMENINO: <?= ($inscripcion->idEstudiante->genero == 'F') ? "<span><strong>[*]</strong></span>" : null?></p></td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro2">
					<td colspan="2" style="text-align:left;width:2.831cm; " class="ce4">
						<p>LUGAR DE NACIMIENTO:</p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="ce2"> </td> -->
					<td colspan="3" style="text-align:left;width:2.258cm; " class="ce9">
						&nbsp;<?= $inscripcion->idEstudiante->lugar_nacimiento ?> 
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:3.54cm; " class="ce34">
						<p>MASCULINO: <?= ($inscripcion->idEstudiante->genero == 'M') ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro1">
					<td style="text-align:left;width:2.831cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:3.54cm; " class="ce2"> <br><br><br></td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro2">
					<td colspan="2" style="text-align:left;width:2.831cm; " class="ce4">
						<p>POSTULADO PARA:</p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="ce2"> </td> -->
					<td colspan="6" style="text-align:left;width:2.258cm; " class="ce31">
						<p>PREMIO DE RECONOCIMIENTO A LA EXCELENCIA: <?= $inscripcion->postulado_para_premio ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro2">
					<td style="text-align:left;width:2.831cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td colspan="6" style="text-align:left;width:2.258cm; " class="ce31">
						<p>PREMIO BECA – ESTIMULO AL ALTO RENDIMIENTO ESTUDIANTIL: <?= $inscripcion->postulado_para_beca ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro1">
					<td style="text-align:left;width:2.831cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:3.54cm; " class="ce2"><br> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro6">
					<td colspan="2" style="text-align:left;width:2.831cm; " class="ce12">
						<p>ULTIMO AÑO/GRADO CULMINADO:
							<span class="T1">  </span>
							<span class="T2">Rellenar el cuadro del grado o año culminado en Julio de 2015</span>
						</p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce32">
						<p>      GRADO:        6to <?= ($inscripcion->codigo_ultimo_grado == 6) ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce35">
						<p>1<span class="T8">er</span> Año <?= ($inscripcion->codigo_ultimo_grado == 7) ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce35">
						<p>2do Año <?= ($inscripcion->codigo_ultimo_grado == 8) ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce35">
						<p>3<span class="T8">er</span> Año<?= ($inscripcion->codigo_ultimo_grado == 9) ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce35">
						<p>4to Año <?= ($inscripcion->codigo_ultimo_grado == 10) ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce35">
						<p>5to Año<?= ($inscripcion->codigo_ultimo_grado == 11) ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<td style="text-align:left;width:3.54cm; " class="ce35">
						<p>6to Año<?= ($inscripcion->codigo_ultimo_grado == 12) ? "<span><strong>[*]</strong></span>" : null?></p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro1">
					<td style="text-align:left;width:2.831cm; " class="ce12"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce33"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce32"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce35"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce40"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce40"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce40"> </td>
					<td style="text-align:left;width:3.54cm; " class="ce40"><br> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro1">
					<td colspan="2" style="text-align:left;width:2.831cm; " class="ce4">
						<p>PROMEDIO DE NOTAS:</p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="ce2"> </td> -->
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro7">
					<td colspan="6" style="text-align:left;width:2.831cm; " class="ce13">
						<p>Si esta optando por el 
							<span class="T3">Premio Beca – Estímulo</span>, indique el promedio de notas obtenido en el grado/año culminado en julio 2015. Ejemplo: 18,358
						</p>
					</td>
					<td colspan="2" style="text-align:center;width:2.258cm; " class="ce42">
						<p><strong>PROMEDIO:</strong></p>
					</td>
					<td style="text-align:left;width:3.54cm; " class="ce26">
						&nbsp;<?= $inscripcion->postulado_para_beca ? $inscripcion->promedio: null?> 
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro8">
					<td colspan="9" style="text-align:left;width:2.831cm; " class="ce14">
						<br>
						<p>Optan por el Premio Beca-Estímulo los estudiantes que han culminado el 6to. Grado de Educación Secundaria Bolivariana hasta los que han culminado el 5to. Año de Educación Secundaria  Bolivariana y/o el sexto Año de Educación Secundaria Bolivariana (Escuelas Técnicas).
						</p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro1">
					<td style="text-align:left;width:2.831cm; " class="Default"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro9">
					<td colspan="9" style="text-align:left;width:2.831cm; " class="ce2">
						<p>Si está optando por el <span class="T3">Premio de Reconocimiento a la Excelencia</span> debe indicar el promedio de notas de los tres últimos años, es decir:
						</p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:3.54cm; " class="ce2"> </td> -->
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
					<tr class="ro1"><td style="text-align:left;width:2.831cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:3.54cm; " class="ce2"><br> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro1">
					<td colspan="2" style="text-align:center;width:2.831cm; " class="ce15">
						<p>Por Sexto Grado</p></td>
					<td style="text-align:left;width:2.258cm; " class="ce2">
					</td>
					<td colspan="2" style="text-align:center;width:2.258cm; " class="ce15">
						<p>Por Tercer Año</p></td>
					<td style="text-align:center;width:2.258cm; " class="ce2"> </td>
					<td colspan="2" style="text-align:center;width:2.258cm; " class="ce15">
						<p>Por Quinto y Sexto Año</p>
					</td>
					<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro8">
					<td style="text-align:left;width:2.831cm; " class="ce16">
						<p>Promedio Global 4to grado:</p></td>
					<td style="text-align:left;width:2.258cm; " class="ce26">
						&nbsp;<?= ($inscripcion->codigo_ultimo_grado == 6 && $inscripcion->postulado_para_premio) ?  $inscripcion->nota1 : null?> 
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce16">
						<p>Promedio Global 1<span class="T8">er</span> año:</p></td>
					<td style="text-align:left;width:2.258cm; " class="ce26">
						&nbsp;<?= ($inscripcion->codigo_ultimo_grado == 9 && $inscripcion->postulado_para_premio) ?  $inscripcion->nota1 : null?>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce2"></td>
					<td style="text-align:left;width:2.258cm; " class="ce16">
						<p>Promedio Global 4to año:</p></td>
					<td style="text-align:left;width:2.258cm; " class="ce26">
						&nbsp;<?= (($inscripcion->codigo_ultimo_grado == 11 || $inscripcion->codigo_ultimo_grado == 12) && $inscripcion->postulado_para_premio) ?  $inscripcion->nota1 : null?>
					</td>
					<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro8">
					<td style="text-align:left;width:2.831cm; " class="ce16">
						<p>Promedio Global 5to grado:</p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce26">
						&nbsp;<?= ($inscripcion->codigo_ultimo_grado == 6 && $inscripcion->postulado_para_premio) ?  $inscripcion->nota2 : null?>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce16">
						<p>Promedio Global 2do año:</p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce26">
						&nbsp;<?= ($inscripcion->codigo_ultimo_grado == 9 && $inscripcion->postulado_para_premio) ?  $inscripcion->nota2 : null?>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce16">
						<p>Promedio Global 5to año:</p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce26">
						&nbsp;<?= (($inscripcion->codigo_ultimo_grado == 11 || $inscripcion->codigo_ultimo_grado == 12) && $inscripcion->postulado_para_premio) ?  $inscripcion->nota2 : null?>
					</td>
					<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro8"><td style="text-align:left;width:2.831cm; " class="ce16">
					<p>Promedio Global 6to grado:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce26">
					&nbsp;<?= ($inscripcion->codigo_ultimo_grado == 6 && $inscripcion->postulado_para_premio) ?  $inscripcion->nota3 : null?>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce16">
					<p>Promedio Global 3<span class="T8">er</span> año:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce26">
					&nbsp;<?= ($inscripcion->codigo_ultimo_grado == 9 && $inscripcion->postulado_para_premio) ?  $inscripcion->nota3 : null?>
				</td><td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce16">
					<p>Promedio Global 6to año:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce26">
					&nbsp;<?= ($inscripcion->codigo_ultimo_grado == 12 && $inscripcion->postulado_para_premio) ?  $inscripcion->nota3 : null?> </td>
				<td style="text-align:left;width:3.54cm; " class="ce44">
					<p>Solo si cursó sexto año</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td colspan="2" style="text-align:left;width:2.831cm; " class="ce17">
					<p>Colocar 3 decimales</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td colspan="2" style="text-align:left;width:2.258cm; " class="ce17">
					<p>Colocar 3 decimales</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td colspan="2" style="text-align:left;width:2.258cm; " class="ce17">
					<p>Colocar 3 decimales</p>
				</td>
				<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce2"> <br></td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro2">
				<td colspan="9" style="text-align:center;width:2.831cm; " class="ce7">
					<p>DATOS DEL PLANTEL</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce45"><br> </td>
			</tr>
			<tr class="ro2">
				<td colspan="2" style="text-align:left;width:2.831cm; " class="ce4">
					<p>CÓDIGO DEL MUNICIPIO:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce9">
					&nbsp;<?= $plantel->cod_municipio; ?>
				</td>
				<td colspan="2" style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td colspan="2" style="text-align:left;width:2.258cm; " class="ce4">
					<p>CÓDIGO DEL PLANTEL:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce9"> 
					&nbsp;<?= $inscripcion->codigo_plantel; ?>
				</td>
				<!-- <td colspan="2" style="text-align:left;width:2.258cm; " class="ce2"> </td> -->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce2"> <br><br><br></td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro2">
				<td rowspan="2" style="text-align:left;width:2.831cm; " class="ce18">
					<p>TIPO DE PLANTEL:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce2">
					<p>PUBLICO <?= ($plantel->tip_pla == 'P') ? "<span><strong>[*]</strong></span>" : null; ?>
					</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				<td colspan="6" rowspan="2" style="text-align:left;width:2.258cm; " class="ce5">
					<p><strong>NOMBRE DEL PLANTEL:</strong></p>
					<p>&nbsp;<?= $plantel->nom_pla; ?></p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro10">
				<td style="text-align:left;width:2.258cm; " class="ce2">
					<p>PRIVADO <?= ($plantel->tip_pla == 'R') ? "<span><strong>[*]</strong></span>" : null; ?></p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
			</tr>
			<tr class="ro11">
				<td style="text-align:left;width:2.831cm; " class="Default"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce2"><br><br><br><br><br><br><br><br><br><br><br><br><br> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td colspan="9" style="text-align:center;width:2.831cm; " class="ce1">
					<p>DATOS SOCIO – ECONÓMICOS</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<!--<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce1"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce2"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro1">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce19">
					<p>Rellenar el óvalo correspondiente</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
			</tr>-->
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce2"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce2"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<!--<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce12">
					<p>Profesión del Jefe de la Familia:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_profesion_jefe_familia == 1) ? "<span><strong>(1)</strong></span>" : " 1";*/ ?>    <?/*= $profesionJefeFamilia[1]*/?><!-- Profesión universitaria o su equivalente--><!-- .</p>-->
			<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>->> <?/*= ($inscripcion->codigo_profesion_jefe_familia == 2) ? "<span><strong>(2)</strong></span>" : " 2"; */?>    <?/*=$profesionJefeFamilia[2]*/?><!-- Profesiones técnicas especializadas--><!-- . </p>-->
			<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_profesion_jefe_familia == 3) ? "<span><strong>(3)</strong></span>" : " 3";*/?>    <?/*= $profesionJefeFamilia[3]*/?><!-- Empleados sin profesión universitaria o técnica. Se incluyen los pequeños comerciantes--><!-- .</p>-->
			<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_profesion_jefe_familia == 4) ? "<span><strong>(4)</strong></span>" : " 4";*/?>    <?/*= $profesionJefeFamilia[4]*/?><!-- Obreros especializados--><!-- .</p>-->
			<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_profesion_jefe_familia == 5) ? "<span><strong>(5)</strong></span>" : " 5";*/?>    <?/*= $profesionJefeFamilia[5]*/?><!-- Obreros no especializados--><!-- .</p>-->
			<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce20"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce20"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce12">
					<p>Nivel de Instrucción de la Madre:</p></td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_nivel_instruccion_madre == 1) ? "<span><strong>(1)</strong></span>" : " 1";*/ ?>    <?/*= $nivelInstruccionMadre[1]*/?><!-- Instrucción universitaria o equivalente --><!--.</p>-->
			<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_nivel_instruccion_madre == 2) ? "<span><strong>(2)</strong></span>" : " 2";*/ ?>    <?/*= $nivelInstruccionMadre[2]*/?><!-- Instrucción secundaria completa --><!--.</p>-->
			<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_nivel_instruccion_madre == 3) ? "<span><strong>(3)</strong></span>" : " 3";*/ ?>    <?/*= $nivelInstruccionMadre[3]*/?><!-- Instrucción secundaria incompleta --><!--.</p>-->
			<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_nivel_instruccion_madre == 4) ? "<span><strong>(4)</strong></span>" : " 4";*/ ?>    <?/*= $nivelInstruccionMadre[1]*/?><!-- Instrucción primaria completa o incompleta --><!--.</p>-->
				<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_nivel_instruccion_madre == 5) ? "<span><strong>(5)</strong></span>" : " 5";*/ ?>    <?/*= $nivelInstruccionMadre[1]*/?><!-- Analfabeta --><!--.</p>-->
			<!--</td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce27"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce20"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce27"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce20"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce27"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce27"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce12">
					<p>Fuente de ingreso:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce28"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--><?/*= ($inscripcion->codigo_fuente_ingreso_familia == 1) ? "<span><strong>(1)</strong></span>" : " 1";*/ ?>    <?/*= $fuenteIngreso[1]*/?><!-- La fuente principal de ingreso familiar corresponde a inversión en empresas, entidades financieras o fortunas heredadas --><!-- .</p>-->
				<!--</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_fuente_ingreso_familia == 2) ? "<span><strong>(2)</strong></span>" : " 2";*/ ?>    <?/*= $fuenteIngreso[2]*/?><!-- Los ingresos consisten en honorarios profesionales --> <!--.</p>-->
				<!--</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_fuente_ingreso_familia == 3) ? "<span><strong>(3)</strong></span>" : " 3";*/ ?>    <?/*= $fuenteIngreso[3]*/?><!-- El ingreso es un sueldo, es decir una remuneración calculada sobre base mensual o anual --><!--.</p>-->
				<!--</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--> <?/*= ($inscripcion->codigo_fuente_ingreso_familia == 4) ? "<span><strong>(4)</strong></span>" : " 4";*/ ?>    <?/*= $fuenteIngreso[4]*/?><!-- El ingreso consiste en un salario fijo, es decir remuneración calculada por semana o por día --> <!--.</p>-->
				<!--</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p>--><?/*= ($inscripcion->codigo_fuente_ingreso_familia == 5) ? "<span><strong>(5)</strong></span>" : " 5"; */?>    <?/*= $fuenteIngreso[5]*/?><!-- El ingreso proviene de la ejecución de trabajos ocasionales o tareas a destajo --> <!--.</p>-->
				<!--</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce20"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce28"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro13">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p><span class="T4">Observación: </span>
					<span class="T5">Si su familia depende de indemnizaciones tales como jubilaciones o pensiones, rellene la categoría que tenia cuando trabajaba.</span>
					</p>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			<!--<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce20"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce28"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce28"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--/tr>-->
			<tr class="ro12">
				<td colspan="7" style="text-align:left;width:2.831cm; " class="ce12">
					<p>Alojamiento y vivienda:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_vivienda_familia == 1) ? "<span><strong>(1)</strong></span>" : " 1"; ?>   <?= $alojamientoVivienda[1]?><!-- Casa o apartamento lujoso y espacioso -->.</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_vivienda_familia == 2) ? "<span><strong>(2)</strong></span>" : " 2"; ?>    <?= $alojamientoVivienda[1]?><!-- Alojamiento que sin ser lujoso, es espacioso, muy cómodo y con óptimas condiciones sanitarias -->.</p>
				</td>
				<!-- td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro9">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_vivienda_familia == 3) ? "<span><strong>(3)</strong></span>" : " 3"; ?>    <?= $alojamientoVivienda[3]?>.<!-- Alojamiento con buenas condiciones sanitarias, en espacio reducido; es decir, una casa pequeña o apartamento modesto, bien --> </p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<!-- <tr class="ro9">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce22">
					<p>       construido y en buen estado de mantenimiento, condiciones adecuadas de iluminación y aire, además de espacios separados </p>
				</td> -->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!-- </tr> -->
			<!-- <tr class="ro9">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce22">
					<p>       para cocina, baño y habitaciones .</p>
				</td> -->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!-- </tr> -->
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_vivienda_familia == 4) ? "<span><strong>(4)</strong></span>" : " 4"; ?>    <?= $alojamientoVivienda[4]?><!-- Vivienda en ambientes espaciosos o reducidos con deficiencia en algunas condiciones sanitarias -->.</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_vivienda_familia == 5) ? "<span><strong>(5)</strong></span>" : " 5"; ?>    <?= $alojamientoVivienda[5]?><!-- Rancho o vivienda con una sola habitación  y condiciones sanitarias deficientes -->.</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			
			<tr class="ro1">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20"> </td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
			</tr>
			<tr class="ro12">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce23">
					<p><span class="T6">Ingreso familiar: </span><span class="T7">(sin deducciones) </span></p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
			</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_ingreso_familia == 1) ? "<span><strong>(1)</strong></span>" : " 1"; ?>    <?= $ingresoFamiliar[1]?><!-- Desde Bs. 22.265,04  hasta  Bs. 29.686,72-->.</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_ingreso_familia == 2) ? "<span><strong>(2)</strong></span>" : " 2"; ?>    <?= $ingresoFamiliar[2]?><!-- Desde Bs. 14.843,37  hasta  Bs. 22.265,04 -->.</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_ingreso_familia == 3) ? "<span><strong>(3)</strong></span>" : " 3"; ?>    <?= $ingresoFamiliar[3]?><!-- Desde Bs. 7.421,69  hasta  Bs. 14.843,36 -->.</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_ingreso_familia == 4) ? "<span><strong>(4)</strong></span>" : " 4"; ?>    <?= $ingresoFamiliar[4]?><!-- Bs. 7.421,68 (salario mínimo) -->.</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="9" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_ingreso_familia == 5) ? "<span><strong>(5)</strong></span>" : " 5"; ?>    <?= $ingresoFamiliar[5]?><!-- Menos de Bs. 7.421,68 -->.</p>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.831cm; " class="ce20"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce12">
					<p>Grupo familiar: </p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_grupo_familiar == 5) ? "<span><strong>(1)</strong></span>" : " 1"; ?>    <?= $grupoFamiliar[5]?><!-- Dos (2) personas -->.</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_grupo_familiar == 4) ? "<span><strong>(2)</strong></span>" : " 2"; ?>    <?= $grupoFamiliar[4]?><!-- Tres (3) a seis (6) personas -->. </p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_grupo_familiar == 3) ? "<span><strong>(3)</strong></span>" : " 3"; ?>    <?= $grupoFamiliar[3]?><!-- Siete (7) a nueve (9) personas -->.</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_grupo_familiar == 2) ? "<span><strong>(4)</strong></span>" : " 4"; ?>    <?= $grupoFamiliar[2]?><!-- Diez (10) a doce (12) personas -->.</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro12">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce20">
					<p> <?= ($inscripcion->codigo_grupo_familiar == 1) ? "<span><strong>(5)</strong></span>" : " 5"; ?>    <?= $grupoFamiliar[1]?><!-- Trece (13) personas o más <--></--></p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<!--<tr class="ro12">
				<td style="text-align:left;width:2.831cm; " class="ce20"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce21"> </td>
				<td style="text-align:left;width:3.54cm; " class="ce21"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td>-->
			<!--</tr>-->
			<!--<tr class="ro1">
				<td colspan="4" style="text-align:left;width:2.831cm; " class="ce24"> </td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				<td colspan="4" style="text-align:left;width:2.258cm; " class="ce24"><br><br><br /> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro1">
				<td colspan="4" style="text-align:center;width:2.831cm; " class="ce25">
					<p>Firma del Solicitante</p></td><td style="text-align:left;width:2.258cm; " class="ce29"> 
				</td>
				<td colspan="4" style="text-align:center;width:2.258cm; " class="ce41">
					<p>Firma del Receptor</p>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
		</table>
		<!--<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />-->
		<table border="0" cellspacing="0" cellpadding="0" class="ta1">
			<colgroup>
				<col width="99"/>
				<col width="99"/>
				<col width="34"/>
				<col width="99"/>
				<col width="99"/>
				<col width="34"/>
				<col width="99"/>
				<col width="99"/>
				<col width="33"/>
				<col width="99"/>
				<col width="111"/>
				<col width="99"/>
			</colgroup>
			<!--<tr class="ro1">
				<td colspan="11" style="text-align:center;width:2.258cm; " class="ce1">
					<p>PLANILLA DE ESTUDIO SOCIO ECONOMICO</p>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> 
				</td> -->
			<!--</tr>
			<tr class="ro1">
				<td colspan="11" style="text-align:center;width:2.258cm; " class="ce102">
					<p>PROGRAMA DE FORTALECIMIENTO AL TALENTO Y LIDERAZGO ESTUDIANTIL</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
			</tr>
			<tr class="ro1">
				<td colspan="11" style="text-align:center;width:2.258cm; " class="ce102">
					<p>-FORTALENTO-</p>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>-->
			
			<tr class="ro1">
				<td colspan="11" style="text-align:center;width:2.258cm; " class="ce102">
					<p>DATOS DEL SOLICITANTE</p></td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce3"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce3"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce3"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce3"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce3"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce3"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce34"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce3"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce3"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce8"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro3">
				<td colspan="5" style="text-align:left;width:2.258cm; " class="ce104">
					<p>APELLIDOS:</p>
					<span class="textoNormal">&nbsp;<?= $inscripcion->idEstudiante->apellido; ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td colspan="5" style="text-align:left;width:2.258cm; " class="ce104">
					<p>NOMBRES:</p>
					<span class="textoNormal">&nbsp;<?= $inscripcion->idEstudiante->nombre; ?></span>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="ce42"> </td> -->
			</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro4">
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>CEDULA DE IDENTIDAD:</p>
					<span class="textoNormal">&nbsp;<?= $inscripcion->idEstudiante->cedula; ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce23"> </td>
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>TELEFONO FIJO:</p>
					<span class="textoNormal">&nbsp;<?= $estudio->telefono_fijo_solicitante; ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>TELEFONO CELULAR:</p>
					<span class="textoNormal">&nbsp;<?= $estudio->telefono_celular_solicitante; ?></span>
				</td>
				<td style="text-align:left;width:0.762cm; " class="ce23"> </td>
				<!--<td colspan="2" style="text-align:left;width:2.258cm; " class="ce23">
					<p>¿VIVE CON LOS PADRES?</p>
				</td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro4">
				<td style="text-align:left;width:0.788cm; " class="ce23"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce23"> </td>
				<!--<td style="text-align:left;width:2.258cm; " class="ce41">
					<p>SI <span class="textoNormal"><strong><?/*= $estudio->vive_con_padres_solicitante ? '[*]' : null; */?></strong></span></p>
				</td>
				<td style="text-align:left;width:2.531cm; " class="ce41">
					<p>NO <span class="textoNormal"><strong><?/*= !$estudio->vive_con_padres_solicitante ? '[*]' : null;*/ ?></strong></span></p>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro4">
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>Nº DE LA PLANILLA DE SOLICITUD:</p>
					<span class="textoNormal">&nbsp;<?= $estudio->n_planilla_inscripcion; ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>GRADO O AÑO FINALIZADO:</p>
					<span class="textoNormal">&nbsp;<?= $grados[$estudio->codigo_ultimo_grado]; ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td colspan="5" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>CORREO ELECTRONICO:</p>
					<span class="textoNormal">&nbsp;<?= $estudianteCorreo; ?></span>
				</td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<tr class="ro4">
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr><tr class="ro1">
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce8"> </td>
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			</tr>
			<!--<tr class="ro1">
				<td colspan="11" style="text-align:center;width:2.258cm; " class="ce109">
					<p>DATOS DE LOS PADRES</p>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro1">
				<td colspan="2" style="text-align:left;width:2.258cm; " class="ce110">
					<p>DATOS DEL PADRE:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce8"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce110"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce8"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro3">
				<td colspan="5" style="text-align:left;width:2.258cm; " class="ce104">
					<p>APELLIDOS:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->apellidos_padre;*/ ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td colspan="5" style="text-align:left;width:2.258cm; " class="ce104">
					<p>NOMBRES:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->nombres_padre;*/ ?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro5">
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>CEDULA DE IDENTIDAD:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->cedula_padre;*/ ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td colspan="3" style="text-align:left;width:2.258cm; " class="ce11">
					<p>GRADO DE INSTRUCCIÓN:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="ce11"> </td> -->
				<!--<td colspan="3" style="text-align:left;width:2.258cm; " class="ce137">
					<p>TELEFONO FIJO:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->telefono_fijo_padre;*/ ?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro5">
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce29">
					<p>PRIMARIA <span class="textoNormal"><strong><?/*= ($estudio->grado_instruccion_padre == 1) ? '[*]' : null;*/ ?></strong></span></p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce29">
					<p>SECUNDARIA<span class="textoNormal"><strong><?/*= ($estudio->grado_instruccion_padre == 2) ? '[*]' : null;*/ ?></strong></span></p>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce33"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce29">
					<p>SUPERIOR <span class="textoNormal"><strong><?/*= ($estudio->grado_instruccion_padre == 3) ? '[*]' : null;*/ ?></strong></span></p>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td colspan="3" style="text-align:left;width:2.258cm; " class="ce137">
					<p>TELEFONO CELULAR:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->telefono_celular_padre;*/ ?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro4">
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>PROFESION:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->profesion_padre;*/ ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>OCUPACION:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->ocupacion_padre;*/ ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>LUGAR DE TRABAJO:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->lugar_trabajo_padre;*/ ?></span>
				</td>
				<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>INGRESO MENSUAL:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->ingreso_mensual_padre;*/ ?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro4">
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce30"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
			</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro5">
				<td colspan="7" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>DIRECCION DE TRABAJO:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->direccion_trabajo_padre;*/ ?></span>
				</td>
				<td colspan="4" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>  CORREO ELECTRONICO:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->correo_e_padre; */?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro5">
				<td style="text-align:left;width:2.258cm; " class="Default"> </td>
			</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro6">
				<td colspan="11" style="text-align:left;width:2.258cm; " class="ce114">
					<p>DIRECCION DE HABITACION (INDIQUE UN PUNTO DE REFERENCIA):</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->direccion_habitacion_padre;*/ ?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				<!--</tr>
			<tr class="ro1">
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td>-->
			<!--</tr>
			<tr class="ro1">
				<td colspan="2" style="text-align:left;width:2.258cm; " class="ce110">
					<p>DATOS DE LA MADRE:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce8"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce110"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce8"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro3">
				<td colspan="5" style="text-align:left;width:2.258cm; " class="ce104">
					<p>APELLIDOS:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->apellidos_madre; */?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
				<td colspan="5" style="text-align:left;width:2.258cm; " class="ce104">
					<p>NOMBRES:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->nombres_madre;*/ ?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro5">
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>CEDULA DE IDENTIDAD:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->cedula_madre;*/ ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td colspan="3" style="text-align:left;width:2.258cm; " class="ce11">
					<p>GRADO DE INSTRUCCIÓN:</p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="ce11"> </td> -->
				<!--<td colspan="3" style="text-align:left;width:2.258cm; " class="ce137">
					<p>TELEFONO FIJO:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->telefono_fijo_madre;*/ ?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				<!--</tr>
			<tr class="ro5">
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce29">
					<p>PRIMARIA <span class="textoNormal"><strong><?/*= ($estudio->grado_instruccion_madre == 1) ? '[*]' : null;*/ ?></strong></span></p>
				</td>
				<td style="text-align:left;width:2.258cm; " class="ce29">
					<p>SECUNDARIA<span class="textoNormal"><strong><?/*= ($estudio->grado_instruccion_madre == 2) ? '[*]' : null;*/ ?></strong></span></p>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce33"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce29">
					<p>SUPERIOR <span class="textoNormal"><strong><?/*= ($estudio->grado_instruccion_madre == 3) ? '[*]' : null;*/ ?></strong></span></p>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce33"> </td>
				<td colspan="3" style="text-align:left;width:2.258cm; " class="ce137">
					<p>TELEFONO CELULAR:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->telefono_celular_madre;*/ ?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro2">
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
				<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
				<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
				<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
			<!--</tr>
			<tr class="ro5">
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>PROFESION:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->profesion_madre;*/ ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>OCUPACION:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->ocupacion_madre;*/ ?></span>
				</td>
				<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>LUGAR DE TRABAJO:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->lugar_trabajo_madre;*/ ?></span>
				</td>
				<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
				<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
					<p>INGRESO MENSUAL:</p>
					<span class="textoNormal">&nbsp;<?/*= $estudio->ingreso_mensual_madre;*/ ?></span>
				</td>-->
				<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				<!--</tr>
				<tr class="ro5">
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce30"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				</tr>
				<tr class="ro2">
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td>-->
				<!--</tr>
				<tr class="ro3">
					<td colspan="7" style="text-align:left;width:2.258cm; " class="ce104">
						<p>DIRECCION DE TRABAJO:</p>
						<span class="textoNormal">&nbsp;<?/*= $estudio->direccion_trabajo_madre;*/ ?></span>
					</td>
					<td colspan="4" style="text-align:left;width:2.258cm; " class="ce104">
						<p>  CORREO ELECTRONICO:</p>
						<span class="textoNormal">&nbsp;<?/*= $estudio->correo_e_madre;*/ ?></span>
					</td>-->
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				<!--</tr>
				<tr class="ro2">
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				<!--</tr>
				<tr class="ro3">
					<td colspan="11" style="text-align:left;width:2.258cm; " class="ce15">
						<p>DIRECCION DE HABITACION (INDIQUE UN PUNTO DE REFERENCIA):</p>
						<span class="textoNormal">&nbsp;<?/*= $estudio->direccion_habitacion_madre;*/ ?></span>
					</td>-->
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				<!--</tr>
				<tr class="ro1">
					<td style="text-align:left;width:2.258cm; " class="ce116"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce126"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce30"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce30"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce105"> </td>-->
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				<!--</tr>-->
				<tr class="ro1">
					<td colspan="11" style="text-align:center;width:2.258cm; " class="ce109">
						<p>DATOS DEL REPRESENTANTE</p>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro2">
					<td style="text-align:left;width:2.258cm; " class="ce110"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce8"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro3">
					<td colspan="5" style="text-align:left;width:2.258cm; " class="ce104">
						<p>APELLIDOS:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->apellidos_representante; ?></span>
					</td>
					<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
					<td colspan="5" style="text-align:left;width:2.258cm; " class="ce104">
						<p>NOMBRES:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->nombres_representante; ?></span>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro2">
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce105"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro5">
					<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
						<p>CEDULA DE IDENTIDAD:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->cedula_representante; ?></span>
					</td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td colspan="3" style="text-align:left;width:2.258cm; " class="ce11">
						<p>GRADO DE INSTRUCCIÓN:</p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td> -->
					<td colspan="3" style="text-align:left;width:2.258cm; " class="ce137">
						<p>TELEFONO FIJO:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->telefono_fijo_representante; ?></span>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro5">
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce29">
						<p>PRIMARIA <span class="textoNormal"><strong><?= ($estudio->grado_instruccion_representante == 1) ? '[*]' : null; ?></strong></span></p>						
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce29">
						<p>SECUNDARIA<span class="textoNormal"><strong><?= ($estudio->grado_instruccion_representante == 2) ? '[*]' : null; ?></strong></span></p>
					</td>
					<td style="text-align:left;width:0.788cm; " class="ce33"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce29">
						<p>UNIVERSITARIO<span class="textoNormal"><strong><?= ($estudio->grado_instruccion_representante == 3) ? '[*]' : null; ?></strong></span> </p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td colspan="3" style="text-align:left;width:2.258cm; " class="ce137">
						<p>TELEFONO CELULAR:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->telefono_celular_representante; ?></span>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro2">
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				</tr>
				
				<tr class="ro3">
					<td colspan="6"  style="text-align:left;width:2.258cm; " class="ce104">
						<p>PROFESION U OCUPACION:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->profesion_representante; ?></span>
					</td>
					<!--<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
						<p>OCUPACION:</p>
						<span class="textoNormal">&nbsp;<?/*= $estudio->ocupacion_representante;*/ ?></span>
					</td>-->
					<td colspan="5"  style="text-align:left;width:2.258cm; " class="ce104">
						<p>LUGAR DE TRABAJO:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->lugar_trabajo_representante; ?></span>
					</td>
					<!--<td colspan="2" rowspan="2" style="text-align:left;width:2.258cm; " class="ce104">
						<p>INGRESO MENSUAL:</p>
						<span class="textoNormal">&nbsp;<?/*= $estudio->ingreso_mensual_representante;*/ ?></span>
					</td>-->
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro5">
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce30"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				</tr>
				<tr class="ro2">
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce105"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro3">
					<td colspan="7" style="text-align:left;width:2.258cm; " class="ce104">
						<p>DIRECCION DE TRABAJO:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->direccion_trabajo_representante; ?></span>
					</td>
					<td colspan="4" style="text-align:left;width:2.258cm; " class="ce104">
						<p>  CORREO ELECTRONICO:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->correo_e_representante; ?></span>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				
				<tr class="ro2">
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				</tr>
				<tr class="ro3">
					<td colspan="11" style="text-align:left;width:2.258cm; " class="ce104">
						<p>DIRECCION DE HABITACION:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->direccion_habitacion_representante; ?></span>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro1">
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce8"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				
				<tr class="ro3">
					<td colspan="7" style="text-align:left;width:2.258cm; " class="ce104">
						<p>TIPO DE CUENTA:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->tipo_cuenta_bancaria_representante; ?></span>
					</td>
					<td colspan="4" style="text-align:left;width:2.258cm; " class="ce104">
						<p>ENTIDAD BANCARIA:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->banco_representante; ?></span>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				
				<tr class="ro2">
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce11"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce105"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				</tr>
				<tr class="ro3">
					<td colspan="11" style="text-align:left;width:2.258cm; " class="ce104">
						<p>NUMERO CUENTA BANCARIA:</p>
						<span class="textoNormal">&nbsp;<?= $estudio->cuenta_bancaria_representante; ?></span>
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro1">
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.788cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:0.762cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td style="text-align:left;width:2.531cm; " class="ce8"> </td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro7">
					<td colspan="6" rowspan="2" style="text-align:left;width:2.258cm; " class="ce117">
						<p>DECLARO QUE LA INFORMACION SUMINISTRADA EN ESTA SOLICITUD ES VERDADERA, COMPLETA Y EXACTA Y AUTORIZO LA INVESTIGACION DE LA MISMA EN CASO DE SER NECESARIO</p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td colspan="4" style="text-align:left;width:2.258cm; " class="ce125">
						<p>FIRMA DEL SOLICITANTE</p>
						<br /><br /><br /><br />
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro7">
					<td style="text-align:left;width:2.258cm; " class="ce8"> </td>
					<td colspan="4" style="text-align:left;width:2.258cm; " class="ce125">
						<p>FIRMA DEL REPRESENTANTE</p>
						<br /><br /><br /><br />
					</td>
					<!-- <td style="text-align:left;width:2.258cm; " class="Default"> </td> -->
				</tr>
				<tr class="ro1">
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
					<td style="text-align:left;width:0.788cm; " class="Default"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
					<td style="text-align:left;width:0.788cm; " class="Default"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
					<td style="text-align:left;width:0.762cm; " class="Default"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
					<td style="text-align:left;width:2.531cm; " class="Default"> </td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				</tr>
				<tr class="ro1">
					<td colspan="11" style="text-align:center;width:2.258cm; " class="ce18">
						<p>RECUERDA CONSIGNAR LOS SIGUIENTES DOCUMENTOS</p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				</tr>
				</tr>
				<tr class="ro1">
					<td colspan="11" style="text-align:left;width:2.258cm; " class="ce20">
						<p>1) Copia del boletin correspondiente al año escolar 2016-2017, para optar a la modalidad de Incentivo al Alto Rendimiento Estudiantil.</p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				</tr>
				<tr class="ro1">
					<td colspan="11" style="text-align:left;width:2.258cm; " class="ce20">
						<p>2) Copia del boletin correspondiente a los años escolares 2014-2015, 2015-2016, 2016-2017 para optar a la modalidad de Premio de Reconocimiento a la Excelencia.</p>
					</td>
					<td style="text-align:left;width:2.258cm; " class="Default"> </td>
				</tr>
				
				
			</table>
