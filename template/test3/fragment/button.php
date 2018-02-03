					<div class="title">
						<h3>Buttons <br />
							<small>Pick your style</small>
						</h3>
					</div>
					<div class="row">
						<div class="col-md-8 col-md-offset-2">


							<button class="btn btn-primary">Default</button>
							<button class="btn btn-primary btn-round">Round</button>




                            <button class="btn btn-primary btn-round">
								<!--<i class="material-icons">favorite</i> With Icon//-->
                                <i class="fa fa-close"></i>With Icon
							</button>


							<button class="btn btn-primary btn-simple">Simple</button>




						</div>
					</div>




	                <div class="title">
	                    <h3>Links</h3>
	                </div>
	                <div class="row">
	                    <div class="col-md-8 col-md-offset-2">
	                        <button class="btn btn-simple">Default</button>
	                        <button class="btn btn-simple btn-primary ">Primary</button>
	                        <button class="btn btn-simple btn-info">Info</button>
	                        <button class="btn btn-simple btn-success">Success</button>
	                        <button class="btn btn-simple btn-warning">Warning</button>
	                        <button class="btn btn-simple btn-danger">Danger</button>
	                    </div>
	                </div>

<div class="bs-docs-section">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12">
                <h1 id="buttons">Buttons</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <h3>Raised buttons <small><code>.btn-raised</code></small></h3>
            <p class="bs-component">
                <db-button caption="default" raised="true"></db-button>



                <db-button class="primary" type="icon">
                    <property name="caption"><i class="material-icons">done</i></property>
                </db-button>

                <db-button caption="Primary" class="primary"></db-button>
                <db-button caption="Success" class="success"></db-button>


                <db-button>
                    <property name="caption">info</property>
                    <property name="class">info</property>
                </db-button>

                <db-button name="caption" class="warning"/>
                <db-button name="danger" class="danger"/>



                <db-button>
                    <property name="caption">link</property>
                    <property name="class">link</property>
                </db-button>
            </p>

            <p class="bs-component">
                <db-button caption="success - xs - rounded -success" size="xs" type="rounded" class="success"></db-button>
                <db-button caption="default - xs" size="xs"></db-button>
                <db-button caption="Primary - s" class="primary" size="s"></db-button>
                <db-button caption="Success - l" class="success" size="l"></db-button>

                <db-button caption="Primary - s - rounded" class="primary" size="s" style="rounded"></db-button>


                <db-button caption="danger - s - raised" class="danger" size="s" raised="true"></db-button>
                <db-button caption="danger - s" class="danger" size="s"></db-button>

            </p>


            <h3>Flat buttons <small>default - no class needed</small></h3>
            <p class="bs-component">
                <a href="javascript:void(0)" class="btn"><code>btn</code> only</a>
                <a href="javascript:void(0)" class="btn active"><code>.active</code></a>
                <a href="javascript:void(0)" class="btn btn-default">Default</a>
                <a href="javascript:void(0)" class="btn btn-primary">Primary</a>
                <a href="javascript:void(0)" class="btn btn-success">Success</a>
                <a href="javascript:void(0)" class="btn btn-info">Info</a>
                <a href="javascript:void(0)" class="btn btn-warning">Warning</a>
                <a href="javascript:void(0)" class="btn btn-danger">Danger</a>
                <a href="javascript:void(0)" class="btn btn-link">Link</a>
            </p>


            <h3>Disabled buttons</h3>

            <fieldset disabled>

                <h3><small>flat - default - no class needed</small></h3>
                <p class="bs-component">
                    <a href="javascript:void(0)" class="btn"><code>btn</code> only</a>
                    <a href="javascript:void(0)" class="btn btn-default">Default</a>
                    <a href="javascript:void(0)" class="btn btn-primary">Primary</a>
                    <a href="javascript:void(0)" class="btn btn-success">Success</a>
                    <a href="javascript:void(0)" class="btn btn-info">Info</a>
                    <a href="javascript:void(0)" class="btn btn-warning">Warning</a>
                    <a href="javascript:void(0)" class="btn btn-danger">Danger</a>
                    <a href="javascript:void(0)" class="btn btn-link">Link</a>
                </p>


                <h3><small><code>.btn-raised</code></small></h3>
                <p class="bs-component">
                    <a href="javascript:void(0)" class="btn btn-raised btn-default">Default</a>
                    <a href="javascript:void(0)" class="btn btn-raised btn-primary">Primary</a>
                    <a href="javascript:void(0)" class="btn btn-raised btn-success">Success</a>
                    <a href="javascript:void(0)" class="btn btn-raised btn-info">Info</a>
                    <a href="javascript:void(0)" class="btn btn-raised btn-warning">Warning</a>
                    <a href="javascript:void(0)" class="btn btn-raised btn-danger">Danger</a>
                    <a href="javascript:void(0)" class="btn btn-raised btn-link">Link</a>
                </p>
            </fieldset>

            <h3>Button sizes</h3>

            <p class="bs-component">
                <a href="javascript:void(0)" class="btn btn-raised btn-lg">Large button</a>
                <a href="javascript:void(0)" class="btn btn-raised">Default button</a>
                <a href="javascript:void(0)" class="btn btn-raised btn-sm">Small button</a>
                <a href="javascript:void(0)" class="btn btn-raised btn-xs">xs button</a>
            </p>

            <h3>Floating action buttons <small>a.k.a fab</small></h3>
            <p class="bs-component">
                <a href="javascript:void(0)" class="btn btn-default btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-primary btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-success btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-info btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-warning btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-danger btn-fab"><i class="material-icons">grade</i></a>
            </p>
            <h4><small><code>.btn-group-sm .btn-fab</code> or <code>.btn-fab-mini</code></small></h4>
            <p class="bs-component btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-default btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-primary btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-success btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-info btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-warning btn-fab"><i class="material-icons">grade</i></a>
                <a href="javascript:void(0)" class="btn btn-danger btn-fab"><i class="material-icons">grade</i></a>
            </p>

        </div>
        <div class="col-md-6">
            <h2>Group variations with <small><code>.btn-raised</code></small></h2>

            <h3>Button groups</h3>
            <div style="margin-bottom: 15px;">
                <div class="btn-toolbar bs-component" style="margin: 0;">

                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn">btn only</a>
                        <a href="bootstrap-elements.html" data-target="#" class="btn dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Action</a></li>
                            <li><a href="javascript:void(0)">Another action</a></li>
                            <li><a href="javascript:void(0)">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Separated link</a></li>
                        </ul>
                    </div>



                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-default btn-raised">Default raised</a>
                        <a href="bootstrap-elements.html" data-target="#" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Action</a></li>
                            <li><a href="javascript:void(0)">Another action</a></li>
                            <li><a href="javascript:void(0)">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Separated link</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-primary btn-raised">Primary raised</a>
                        <a href="bootstrap-elements.html" data-target="#" class="btn btn-primary btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Action</a></li>
                            <li><a href="javascript:void(0)">Another action</a></li>
                            <li><a href="javascript:void(0)">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Separated link</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-success">Success</a>
                        <a href="bootstrap-elements.html" data-target="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Action</a></li>
                            <li><a href="javascript:void(0)">Another action</a></li>
                            <li><a href="javascript:void(0)">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Separated link</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-info">Info</a>
                        <a href="bootstrap-elements.html" data-target="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Action</a></li>
                            <li><a href="javascript:void(0)">Another action</a></li>
                            <li><a href="javascript:void(0)">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Separated link</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-warning">Warning</a>
                        <a href="bootstrap-elements.html" data-target="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Action</a></li>
                            <li><a href="javascript:void(0)">Another action</a></li>
                            <li><a href="javascript:void(0)">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Separated link</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-danger">Danger</a>
                        <a href="bootstrap-elements.html" data-target="#" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)">Action</a></li>
                            <li><a href="javascript:void(0)">Another action</a></li>
                            <li><a href="javascript:void(0)">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0)">Separated link</a></li>
                        </ul>
                    </div>
                </div>
            </div>



            <h3><small><code>btn-lg.btn-block.btn-raised</code></small></h3>
            <div class="bs-component">
                <a href="javascript:void(0)" class="btn btn-default btn-lg btn-block btn-raised">Block level button</a>
                <fieldset disabled>
                    <a href="javascript:void(0)" class="btn btn-default btn-lg btn-block btn-raised">Block level button disabled</a>
                </fieldset>
            </div>


            <div class="bs-component" style="margin-bottom: 15px;">
                <h3><small><code>btn-group.btn-group-justified.btn-group-raised</code></small></h3>
                <div class="btn-group btn-group-justified btn-group-raised">
                    <a href="javascript:void(0)" class="btn ">Left</a>
                    <a href="javascript:void(0)" class="btn ">Middle</a>
                    <a href="javascript:void(0)" class="btn ">Right</a>
                </div>

                <h3><small>disabled <code>btn-group.btn-group-justified.btn-group-raised</code></small></h3>
                <fieldset disabled>
                    <div class="btn-group btn-group-justified btn-group-raised">
                        <a href="javascript:void(0)" class="btn ">Left</a>
                        <a href="javascript:void(0)" class="btn ">Middle</a>
                        <a href="javascript:void(0)" class="btn ">Right</a>
                    </div>
                </fieldset>
            </div>

            <div class="bs-component" style="margin-bottom: 15px;">
                <h3><small><code>btn-toolbar</code></small></h3>
                <div class="btn-toolbar">
                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn">1</a>
                        <a href="javascript:void(0)" class="btn">2</a>
                        <a href="javascript:void(0)" class="btn">3</a>
                        <a href="javascript:void(0)" class="btn">4</a>
                    </div>

                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-raised">5</a>
                        <a href="javascript:void(0)" class="btn btn-raised">6</a>
                        <a href="javascript:void(0)" class="btn btn-raised">7</a>
                    </div>

                    <div class="btn-group">
                        <a href="javascript:void(0)" class="btn btn-raised">8</a>

                        <div class="btn-group">
                            <a href="bootstrap-elements.html" data-target="#" class="btn btn-raised dropdown-toggle" data-toggle="dropdown">
                                Dropdown
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Dropdown link</a></li>
                                <li><a href="javascript:void(0)">Dropdown link</a></li>
                                <li><a href="javascript:void(0)">Dropdown link</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bs-component">
                <h3><small><code>.btn-group-vertical</code></small></h3>
                <div class="btn-group-vertical">
                    <a href="javascript:void(0)" class="btn btn-raised">Button</a>
                    <a href="javascript:void(0)" class="btn btn-raised">Button</a>
                    <a href="javascript:void(0)" class="btn btn-raised">Button</a>
                    <a href="javascript:void(0)" class="btn btn-raised">Button</a>
                </div>
            </div>


        </div>
    </div>
</div>
