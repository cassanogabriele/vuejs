<!-- Ajout d'un utilisateur -->
<div class="myModal" v-if="showAddModal">
	<div class="modalContainer">
		<div class="modalHeader">
			<span class="headerTitle">Add New Member</span>
			<button class="closeBtn pull-right" @click="showAddModal = false">&times;</button>
		</div>
		<div class="modalBody">
			<div class="form-group">
				<label>Firstname:</label>
				<input type="text" class="form-control" v-model="newMember.firstname">
			</div>
			<div class="form-group">
				<label>Lastname:</label>
				<input type="text" class="form-control" v-model="newMember.lastname">
			</div>
		</div>
		<hr>
		<div class="modalFooter">
			<div class="footerBtn pull-right">
				<button class="btn btn-default" @click="showAddModal = false"><span class="glyphicon glyphicon-remove"></span> Cancel</button> <button class="btn btn-primary" @click="showAddModal = false; saveMember();"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</div>
		</div>
	</div>
</div>




