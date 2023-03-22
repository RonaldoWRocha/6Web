
	  function formatar(mascara, documento){
           var i = documento.value.length;
           var saida = mascara.substring(0,1);
           var texto = mascara.substring(i)
         
           if (texto.substring(0,1) != saida){
         			documento.value += texto.substring(0,1);
           }
         }
		 
         $(document).ready(function () {
         
         	$('select').selectpicker();
         
         });
		 $(document).ready(function() {
		//You can name this function anything you like
			function activePage(){
			//When user lands on your website location.pathname is equal to "/" and in 
			//that case it will add "active" class to all links
			//Therefore we are going to remove first character "/" from the pathname
			  var currentPage = location.pathname;
			  var slicedCurrentPage = currentPage.slice(1);
			//This will add active class to link for current page
			  $('.nav-link').removeClass('active');
			  $('a[href*="' + location.pathname + '"]').closest('li').addClass('active');
			//This will add active class to link for index page when user lands on your website
			
			var explode = currentPage.split("/", 3);
				 if (explode[2] == "registrosSi") {
					 $('a[href*="auditoria/BuscarSi"]').closest('li').addClass('active');
				}
				if (explode[2] == "registrosSetor") {
					 $('a[href*="auditoria/BuscarProjeto"]').closest('li').addClass('active');
				}
				if (explode[2] == "iniciaRegistro") {
					 $('a[href*="auditoria/auditar"]').closest('li').addClass('active');
				}
				if (explode[2] == "abrirConfig") {
					 $('a[href*="auditoria/configuracoes"]').closest('li').addClass('active');
				}
			}
		//Invoke function
		activePage();
		});

		 // ---------Responsive-navbar-active-animation-----------
         function test(){
         var tabsNewAnim = $('#navbarSupportedContent');
         var selectorNewAnim = $('#navbarSupportedContent').find('li').length;
         var activeItemNewAnim = tabsNewAnim.find('.active');
         var activeWidthNewAnimHeight = activeItemNewAnim.innerHeight();
         var activeWidthNewAnimWidth = activeItemNewAnim.innerWidth();
         var itemPosNewAnimTop = activeItemNewAnim.position();
         var itemPosNewAnimLeft = activeItemNewAnim.position();
         $(".hori-selector").css({
         "top":itemPosNewAnimTop.top + "px", 
         "left":itemPosNewAnimLeft.left + "px",
         "height": activeWidthNewAnimHeight + "px",
         "width": activeWidthNewAnimWidth + "px"
         });
         $("#navbarSupportedContent").on("click","li",function(e){
         $('#navbarSupportedContent ul li').removeClass("active");
         $(this).addClass('active');
         var activeWidthNewAnimHeight = $(this).innerHeight();
         var activeWidthNewAnimWidth = $(this).innerWidth();
         var itemPosNewAnimTop = $(this).position();
         var itemPosNewAnimLeft = $(this).position();
         $(".hori-selector").css({
         "top":itemPosNewAnimTop.top + "px", 
         "left":itemPosNewAnimLeft.left + "px",
         "height": activeWidthNewAnimHeight + "px",
         "width": activeWidthNewAnimWidth + "px"
         });
         });
         }
         $(document).ready(function(){
         setTimeout(function(){ test(); });
         });
         $(window).on('resize', function(){
         setTimeout(function(){ test(); }, 500);
         });
         $(".navbar-toggler").click(function(){
         $(".navbar-collapse").slideToggle(300);
         setTimeout(function(){ test(); });
         });
         
         
         
         // --------------add active class-on another-page move----------
         jQuery(document).ready(function($){
         // Get current path and find target link
         var path = window.location.pathname.split("/").pop();
         
         // Account for home page with empty path
         if ( path == '' ) {
         path = 'index.html';
         }
         
         var target = $('#navbarSupportedContent ul li a[href="'+path+'"]');
         // Add active class to target link
         target.parent().addClass('active');
         });
		 
		 