<!DOCTYPE html>
	<html>
		<head>
			<title>Liste de membres</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> 
		</head>
		
		<body>	
			<section class="container">				
				<section id="members">
					<section class="col-md-8 col-md-offset-2">
						<article class="row">
							<div class="col-md-12">
								<h1 class="page-header text-center">Liste de membres</h1>							
								
								<button class="btn btn-primary pull-right" @click="showAddModal = true"><span class="glyphicon glyphicon-plus"></span> Ajouter</button>							
							</div>
						</article>
						
						<hr id="hr-style"/>

						<article class="alert alert-danger text-center" v-if="errorMessage">
							<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
							<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
						</article>
						
						<article class="alert alert-success text-center" v-if="successMessage">
							<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
							<span class="glyphicon glyphicon-ok"></span> {{ successMessage }}
						</article>

						<table class="table table-bordered table-striped text-center">
							<thead>
								<th class="text-center">Nom</th>
								<th class="text-center">Prénom</th>								
								<th class="text-center">Action</th>
							</thead>
							
							<tbody>
								<tr v-for="member in members">
									<td>{{ member.firstname }}</td>
									<td>{{ member.lastname }}</td>									
									<td>
										<button class="btn btn-success" @click="showEditModal = true; selectMember(member);"><span class="glyphicon glyphicon-edit"></span> Modifier</button> 
										<button class="btn btn-danger" @click="showDeleteModal = true; selectMember(member);"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>
 
									</td>
								</tr>
							</tbody>
						</table>
					</section>

					<!-- Ajout d'un utilisateur -->
					<section class="myModal" v-if="showAddModal">
						<section class="modalContainer">
							<article class="modalHeader">
								<span class="headerTitle">Ajouter un nouveau membre</span>
								<button class="closeBtn pull-right" @click="showAddModal = false">&times;</button>
							</article>
							
							<article class="modalBody">
								<aside class="form-group">
									<label>Nom :</label>
									<input type="text" class="form-control" v-model="newMember.firstname">
								</aside>
								
								<aside class="form-group">
									<label>Prénom :</label>
									<input type="text" class="form-control" v-model="newMember.lastname">
								</aside>								
							</article>
							
							<hr>
							
							<article class="modalFooter">
								<aside class="footerBtn pull-right">
									<button class="btn btn-default" @click="showAddModal = false"><span class="glyphicon glyphicon-remove"></span> Annuler</button> 
									<button class="btn btn-primary" @click="showAddModal = false; saveMember();"><span class="glyphicon glyphicon-floppy-disk"></span> Enregistrer</button>
								</aside>
							</article>
						</section>
					</section>
					
					<!-- Modification d'un utilisateur -->
					<section class="myModal" v-if="showEditModal">
						<section class="modalContainer">
							<article class="modalHeader">
								<span class="headerTitle">Modifier le membre</span>
								<button class="closeBtn pull-right" @click="showEditModal = false">&times;</button>
							</article>
							
							<article class="modalBody">
								<aside class="form-group">
									<label>Firstname:</label>
									<input type="text" class="form-control" v-model="clickMember.firstname">
								</aside>
								
								<aside class="form-group">
									<label>Lastname:</label>
									<input type="text" class="form-control" v-model="clickMember.lastname">
								</aside>
							</article>
							
							<hr>
							
							<article class="modalFooter">
								<aside class="footerBtn pull-right">
									<button class="btn btn-default" @click="showEditModal = false"><span class="glyphicon glyphicon-remove"></span> Annuler</button> 
									<button class="btn btn-success" @click="showEditModal = false; updateMember();"><span class="glyphicon glyphicon-check"></span> Enregistrer</button>
								</aside>
							</article>
						</section>
					</section>
					
					<!-- Suppression d'un utilisateur -->				
					<section class="myModal" v-if="showDeleteModal">
						<section class="modalContainer">
							<article class="modalHeader">
								<span class="headerTitle">Supprimer le membre</span>
								<button class="closeDelBtn pull-right" @click="showDeleteModal = false">&times;</button>
							</article>
							
							<article class="modalBody">
								<h5 class="text-center">Etes-vous sûr que vous voulez le supprimer ?</h5>
								<h2 class="text-center">{{clickMember.firstname}} {{clickMember.lastname}}</h2>
							</article>
							
							<hr>
							
							<article class="modalFooter">
								<div class="footerBtn pull-right">
									<button class="btn btn-default" @click="showDeleteModal = false"><span class="glyphicon glyphicon-remove"></span> Annuler</button> 
									<button class="btn btn-danger" @click="showDeleteModal = false; deleteMember(); "><span class="glyphicon glyphicon-trash"></span> Oui</button>
								</div>
							</article>
						</section>
					</section>
				</section>
			</section>
			
			<a href="http://homesweethomedesign.gabriel-cassano.be/" style="display:none;">Home Sweet Home Design</a>
			<a href="http://invokingdemons.gabriel-cassano.be/" style="display:none;">invoking demons</a>
			<a href="http://icyber-corp.gabriel-cassano.be/" style="display:none;">Icyber-Corp.</a>
			
			<script src="js/vue.js"></script>
			<script src="js/axios.js"></script>
			<script src="js/app.js"></script>
		</body>
	</html>