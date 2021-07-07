<?php 
?>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style type='text/css'>
.card-pay{
    background-color:whitesmoke;
    color: #00b8d4;;
    font-size:36px;
    padding: 20px;
    border-radius: 5px;
    box-shadow: #e6e6e6 5px 5px 5px;
    position: relative;
}
    u:hover {
        color: #1c313a;
        font-weight: bolder;
    }
    .brand_logo_container {
			position: absolute;
			border-radius: 50%;
			background: #60a3bc;
			padding: 10px;
			text-align: center;
		}
		.brand_logo {

			border: 2px solid white;
		}
        .input_user,
		.input_pass:focus {
			box-shadow: none !important;
			outline: 0px !important;
		}
        .mt-25 {
            margin-top: 10% !important;
            }
        .mb-50 {
            margin-bottom: 80% !important;
            }
            .overlay {
        position: fixed; /* Sit on top of the page content */
        display: flex; /* Hidden by default */
        width: 100%; /* Full width (cover the whole page) */
        height: 100%; /* Full height (cover the whole page) */
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5); /* Black background with opacity */
        z-index: 3; /* Specify a stack order in case you're using a different order for other elements */
        cursor: pointer; /* Add a pointer on hover */
        align-items: center;
        justify-content: center;
}

</style>
<!doctype html>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css" integrity="sha512-0V10q+b1Iumz67sVDL8LPFZEEavo6H/nBSyghr7mm9JEQkOAm91HNoZQRvQdjennBb/oEuW+8oZHVpIKq+d25g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>UX Group Test</title>
  </head>
  <body>

    <div class="container-fluid p-0 m-0 body-novo col-sm-12 col-">
        <div class="overlay d-none" id="loading">
            <div class="spinner-border spinner-border-lg text-white" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="card mb-1 pb-1 pt-1">
            <div class="card-header d-flex justify-content-center bg-light">
					<div class="row text-center">
                        <p class="h5 text-dark" style="font-family: Tahoma, Geneva, sans-serif;">Clínica UX Group</p>
					</div>
			</div>
            <div class="card-body d-flex justify-content-center bg-dark h-100">
               

                <div  id="register" class="card-pay bg-light mt-25 mb-50">
                        <div class="row col-12 col-sm-12 p-1 m-1">
                            <h2 id="discourse-modal-title" class="text-primary">Cadastre-se</h2>
                        </div>
                        <div class="row col-12 col-sm-12 p-1 m-1">
                            <div class="col-sm-4 col-xl-4  d-block">
                                <div class="form-group">
                                    <label for="razao_social" class="text-dark" style="font-size:14px">Nome Completo</label>
                                    <input type="text" name="razao_social" id="razao_social" class="form-control form-control-sm input_user" value="" placeholder="Nome Completo">
                                </div>
                            </div>
                            <div class="col-sm-5 col-xl-4 d-block">
                                <div class="form-group">
                                    <label for="birthdate" class="text-dark" style="font-size:14px">Data de Nascimento</label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control form-control-sm input_user" value="">
                                </div>
                            </div>
                            <div class="col-sm-4 col-xl-4  d-block">
                                <div class="form-group">
                                    <label for="taxpayer_id" class="text-dark" style="font-size:14px">CPF</label>
                                    <input type="text" name="taxpayer_id" id="taxpayer_id" class="form-control form-control-sm input_user" value="" placeholder="CPF">
                                </div>
                            </div>
                         
                        </div>
                 
                    <div class="row col-12 col-sm-12 p-1 m-1">
                        <div class="col-sm-4 col-xl-4 d-block">
                            <div class="form-group">
                                <label for="weigth" class="text-dark" style="font-size:14px">Peso</label>
                                <input type="number" name="weigth" id="weigth" class="form-control form-control-sm input_user" value="" placeholder="Peso">
                            </div>
                        </div>
                        <div class="col-sm-4 col-xl-4  d-block">
                            <div class="form-group">
                                <label for="heighth" class="text-dark" style="font-size:14px">Altura</label>
                                <input type="text" name="heighth" id="heighth" class="form-control form-control-sm input_user" value="" placeholder="Altura">
                            </div>
                        </div>
                        <div class="col-sm-4 col-xl-4  d-block">
                            <div class="form-group">
                                <label for="uf" class="text-dark" style="font-size:14px">Estado</label>
                                <select class="form-control form-control-sm " id="uf" name="uf">
                                    <option selected>Selecione um Estado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row col-12 col-sm-12 p-1 m-1">
                        <div class="col-sm-10 col-xl-10 d-flex justify-content-center">
                           <button class="btn btn-success btn-sm" onClick=register()>Cadastrar</button>
                        </div>
                    </div>

                </div>
			</div>
        </div>
    </div>
  </body>
</html>
<script>
var url_api = "http://localhost/Api/youX/public/";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/register.js"></script>