<!DOCTYPE html>
<html lang="en">
<?php require 'header.php'; ?>
<center>		
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="img/LOGOxx.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
<br>
<br>
    <br>
    <form action="usermanage.php?function=2" method = "POST" Align = "center">
    <input type="hidden" value = "2" name = "function">
      
		<div class="form-group">
	<label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" name = "fname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="first name">
		</div>
	<br>
	<div class="form-group">
    <label for="exampleInputEmail1">Familyname</label>
    <input type="text" class="form-control" name = "lname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Familyname">
		</div>
			<br>
		<div class="form-group">
	<label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control"  name = "email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
	</div>
  <label for="exampleInputEmail1">Status</label>
  <select class="form-control form-control-sm" name = "Type">
  <option value="2">GUEST</option>
<option value="1">ADMIN</option>   
 
  </select>
  <br><br>
					<div class="d-flex justify-content-center mt-3 login_container">
					
				 	<button type="submit" class="btn btn-primary">Accept</button>&nbsp&nbsp
				    <a href="indexadmin.php"><button type="submit" class="btn btn-danger">Back</button></a>
				   </div>
				   
				   
					</form>
				</div>
				</div>
			</div>
		</div>
	</center>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>