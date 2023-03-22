<html lang="pt-br">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <head>
      <meta name="theme-color" content="#2e8cc2">
      <title><?= app('app_name'); ?> - <?= $viewData['title'] ?></title>
      <link rel="icon" href="<?php echo base_url("/views/assets/favicon.ico"); ?>">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url("/views/assets/fonts/font-awesome.min.css"); ?>">
      <link href="<?php echo base_url("/views/assets/css/admin4b.min.css"); ?>" rel="stylesheet">
      <link href="<?php echo base_url("/views/assets/css/custom.css"); ?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url("/views/assets/css/bootstrap-datetimepicker.min.css"); ?>">
      <link rel="stylesheet" href="<?php echo base_url("/views/assets/css/bootstrap-select.css"); ?>"/>
      <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"/>
      <link href="<?php echo base_url("/views/assets/css/fullcalendar.min.css"); ?>" rel="stylesheet">
      <script src="<?php echo base_url("/views/assets/js/fullcalendar.min.js"); ?>" defer></script>
      <script src="<?php echo base_url("/views/assets/locale/pt-br.js"); ?>" defer></script>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" defer></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" defer></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js" defer></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" defer></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js" defer></script>
      <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js" defer></script>
      <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js" defer></script>
      <script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js" defer></script>
      <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      <link href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css" rel="stylesheet">
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </head>
   <style>
		body{
  font-family: sans-serif;
}

.fab{
  position: fixed;
  bottom:10px;
  right:10px;
}

.fab button{
  cursor: pointer;
  width: 48px;
  height: 48px;
  border-radius: 30px;
  background-color: #cb60b3;
  border: none;
  box-shadow: 0 1px 5px rgba(0,0,0,.4);
  font-size: 24px;
  color: white;
    
  -webkit-transition: .2s ease-out;
  -moz-transition: .2s ease-out;
  transition: .2s ease-out;
}

.fab button:focus{
  outline: none;
}

.fab button.main{
  position: absolute;
  width: 60px;
  height: 60px;
  border-radius: 30px;
  background-color: #5b19b7;
  right: 0;
  bottom: 0;
  z-index: 20;
}

.fab button.main:before{
  
}

.fab ul{
  position:absolute;
  bottom: 0;
  right: 0;
  padding:0;
  padding-right:5px;
  margin:0;
  list-style:none;
  z-index:10;
  
  -webkit-transition: .2s ease-out;
  -moz-transition: .2s ease-out;
  transition: .2s ease-out;
}

.fab ul li{
  display: flex;
  justify-content: flex-start;
  position: relative;
  margin-bottom: -10%;
  opacity: 0;
  
  -webkit-transition: .3s ease-out;
  -moz-transition: .3s ease-out;
  transition: .3s ease-out;
}

.fab ul li label{
  margin-right:10px;
  white-space: nowrap;
  display: block;
  margin-top: 10px;
  padding: 5px 8px;
  background-color: white;
  box-shadow: 0 1px 3px rgba(0,0,0,.2);
  border-radius:3px;
  height: 18px;
  font-size: 16px;
  pointer-events: none;
  opacity:0;
  
  -webkit-transition: .2s ease-out;
  -moz-transition: .2s ease-out;
  transition: .2s ease-out;
}

.fab.show button.main,
.fab.show button.main{
  outline: none;
  background-color: #7716ff;
  box-shadow: 0 3px 8px rgba(0,0,0,.5);
 }
 
.fab.show button.main:before,
.fab.show button.main:before{
  
}

.fab.show button.main + ul,
.fab.show button.main + ul{
  bottom: 70px;
}

.fab.show button.main + ul li,
.fab.show button.main + ul li{
  margin-bottom: 10px;
  opacity: 1;
}

.fab.show button.main + ul li:hover label,
.fab.show button.main + ul li:hover label{
  opacity: 1;
}
   </style>
   <body>
      <div class="app">
      <div class="app-content">
      <div class="content-header">
         <nav class="navbar navbar-expand-custom navbar-mainbg">
            <a class="navbar-brand navbar-logo" href="#"><?= app('app_name'); ?></a>
            <button class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto">
                  <div class="hori-selector">
                     <div class="left"></div>
                     <div class="right"></div>
                  </div>
                  <li class="nav-item">
                     <a class="nav-link" href="<?= base_url("/home/index"); ?>"><i class="fa fa-home"></i>Dashboard</a>
                  </li>
                  <span class="sidebar-nav-icon "></span> 
                  <li class="nav-item">
                     <a class="nav-link" href="<?= base_url("/auditoria/auditar"); ?>"><i class="fa fa-plus"></i>Auditar</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?= base_url("/auditoria/BuscarSi"); ?>"><i class="fa fa-users"></i>Buscar por SI</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?= base_url("/auditoria/BuscarProjeto"); ?>"><i class="fa fa-tasks"></i>Buscar por projeto</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?= base_url("/auditoria/configuracoes"); ?>"><i class="fa fa-cog"></i>Gerenciamento</a>
                  </li>
				  
                  <li class="nav-item">
                     <a class="nav-link" href="<?= base_url("/login/logout"); ?>"></i>Sair</a>
                  </li>
               </ul>
            </div>
         </nav>
      </div>
      <!-- /Menu superior e lateral -->
      <div class="content-body">
         <!-- START: Main Content-->
         <main>
            <div class="container-fluid site-width" style="padding-top: 0px;">
               <?php
                  echo boxFlash();
                  echo boxAjax();
                  ?>
               <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div>
			
			<div class="fab">
			<input type="hidden" id="passa_session" value=""/>
			  <button class="main">
			  <div class="codigo" style="padding-top: 10px;">
				<b style="font-size: 20px;"><span id="hora">00:</span><span id="minuto">00</span></b><p style="margin-top: -6;"><span id="segundo" style="font-size: 12px">00s</span></p><br>
				<div id="voltas"></div>
			</div>
			  </button>
			  <ul>
				<li>
				  <button>
				  <i class="fa fa-play" style="margin-right: 0px;"></i>
				  </button>
				</li>
				<li>
				  <button>
				  <i class="fa fa-pause" style="margin-right: 0px;"></i>
				  </button>
				</li>
				<li>
				  <button>
				  <i class="fa fa-stop" style="margin-right: 0px;"></i>
				  </button>
				</li>
			  </ul>
			</div>
         </main>
      </div>
      <script src="<?php echo base_url("/views/assets/js/moment.min.js"); ?>"></script>
      <script src="<?php echo base_url("/views/assets/js/highlight.min.js"); ?>"></script>
      <script src="<?php echo base_url("/views/assets/js/Chart.bundle.min.js"); ?>"></script>
      <script src="<?php echo base_url("/views/assets/js/admin4b.min.js"); ?>"></script>   
      <script src="<?php echo base_url("/views/assets/js/bootstrap-datetimepicker.min.js"); ?>" defer></script>
      <script src="<?php echo base_url("/views/assets/js/bootstrap-select.min.js"); ?>" defer></script>	
      <script src="<?php echo base_url("/views/assets/js/datatable.script.js"); ?>"></script>
	  <script src="<?php echo base_url("/views/assets/js/cronometro.js"); ?>"></script>
      <script>
         var BASE = '<?php echo base_url(); ?>';
		 
		 function toggleFAB(fab){
			if(document.querySelector(fab).classList.contains('show')){
			document.querySelector(fab).classList.remove('show');
		  }else{
			document.querySelector(fab).classList.add('show');
		  }
		}

		document.querySelector('.fab .main').addEventListener('click', function(){
			toggleFAB('.fab');
		});

		document.querySelectorAll('.fab ul li button').forEach((item)=>{
			item.addEventListener('click', function(){
				toggleFAB('.fab');
			});
		});
      </script>
      <script src="<?php echo base_url("/views/assets/motor_ajax/motor_ajax.js"); ?>"></script>
      <script src="<?php echo base_url("/views/assets/js-custom/my-scripts.js"); ?>"></script>
   </body>
</html>
</body>
</html>