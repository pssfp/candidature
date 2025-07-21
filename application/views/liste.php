<div class="row">
    <div class="col-lg-12">
        <div class="bs-example">
            <div class="jumbotron">
                <div class="bs-docs-section1" style="min-height: 800px; font-size: 17px;">


                    <div  style="text-align: center;">
                        <h2 id="forms">Listes des candidatures enrégistrées <br/> </h2> 
                    </div>
                    <!-- Debut Tableau
                          ================================================== -->
                   

                    <div class="row">
                        
                        <div class="col-lg-8  "  >
                        <span><b>Nombre de candidatures enregistrées</b>: <?php echo $nbtotal; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span><b>Nombre de candidatures déposées</b>: <?php echo $nbDeposer; ?></span>
                        </div> 
                            
                        <div class="col-lg-4 col-lg-offset-2 " style="float: right" >
                            
                            <div class="btn-group">
                                <a class="btn btn-danger" href="impression/imprimer_liste/"><i class="icon-print icon-white"></i> Actions générales</a>
                                <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="impression/imprimer_liste/"><i class="icon-download-alt"></i> Imprimer toutes la liste</a></li>
                                    <li class="divider"></li>
                                    <li><a href="impression/imprimer_liste/1"><i class="icon-download-alt"></i> Imprimer les candidats de Comptabilité publique</a></li>
                                    <li><a href="impression/imprimer_liste/2"><i class="icon-download-alt"></i> Imprimer les candidats de Gestion Budgétaire</a></li>
                                    <li><a href="impression/imprimer_liste/3"><i class="icon-download-alt"></i> Imprimer les candidats de Finances Publiques locales</a></li>
                                    <li class="divider"></li>
                                    <li><a href=""><i class="icon-inbox"></i> Exporter Ver Excel</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="well">
                                    <form action="<?php echo site_url('liste/index'); ?>" method="post" class="bs-example form-horizontal" >
                                        <div class="bs-example table-responsive">
                                            	<div class="data"><?php echo $table; ?></div>
                                                <div class="paging"><?php echo $pagination; ?></div>
                                                <br />
                                        </div><!--/example-->
                                    </form>
                                </div>
                            </div>


                        </div>


                </div>
            </div>
        </div>
    </div>
</div>