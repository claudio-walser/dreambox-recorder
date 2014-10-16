
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
            <li class ="<?php echo $request->getParam('header', 'record') == 'record' ? 'active' : ''; ?>">
            	<a href="/?header=record">Aufnehmen</a>
            </li>
            <li class ="<?php echo $request->getParam('header') == 'planned' ? 'active' : ''; ?>">
              <a href="/?header=planned">Geplant</a>
            </li>
            <li class ="<?php echo $request->getParam('header') == 'video' ? 'active' : ''; ?>">
              <a href="/?header=video">Videothek</a>
            </li>
            <li class ="<?php echo $request->getParam('header') == 'current' ? 'active' : ''; ?>">
              <a href="/?header=current">Aktuelle Aufnahme</a>
            </li>
          </ul>
        </div>

      </div>
    </div>