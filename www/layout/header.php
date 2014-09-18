
<!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Dreambox Recorder</a>
        </div>
        
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class ="<?php echo $request->getParam('header') == 'record' ? 'active' : ''; ?>">
            	<a href="<?php echo getCurrentLink(array('header' => 'record')); ?>">Aufnehmen</a>
            </li>
             <li class ="<?php echo $request->getParam('header') == 'video' ? 'active' : ''; ?>">
            	<a href="<?php echo getCurrentLink(array('header' => 'video')); ?>">Videothek</a>
            </li>
          </ul>
        </div>

      </div>
    </div>