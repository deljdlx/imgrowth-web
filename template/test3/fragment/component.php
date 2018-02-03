



<div class="modal fade" id="richEditor-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>






<div class="row">


    <db-panel>
        <property name="title">Summer note exemple</property>
        <property name="icon">fa-hand-pointer-o </property>
        <property name="content">


            <db-richeditor>
                <property name="content">

                    <db-circlegauge title="Carlos Tavares">
                        <property name="content">
                            Carlos Antunes Tavares, né le 14 août 1958 à Lisbonne (Portugal), est un dirigeant d'entreprise portugais.
                        </property>
                        <property name="subTitle">PDG PSA</property>
                        <property name="value">0.75</property>
                        <property name="image">fixture/tavares.jpg</property>
                    </db-circlegauge>


                    <db-cardpanel color="primary">
                        <property name="title">Hélo</property>
                        <property name="subTitle">€ ici ça marche héhéhé</property>
                        <property name="icon">fa-bomb</property>
                    </db-cardpanel>


                </property>
            </db-richeditor>



        </property>
    </db-panel>
</div>










<div class="row">
    <db-panel title="Some ripple effetcs" icon="fa-hand-pointer-o">
        <property name="content">
            <button class="customRipple" data-ripple-color="#FFF" style="padding: 8px;font-size: 22px; background-color: #89669b; border: none; color:#FFF">ça marche</button>
            <div class="customRipple" style="padding: 8px;font-size: 22px; background-color: #444444; border: none; color:#FFF">div with custom ripple</div>
        </property>
    </db-panel>
</div>






    <div class="row">




        <db-panel>
            <property name="title">Liste card panel (ça marche ?)</property>
            <property name="icon">fa-hand-pointer-o </property>
            <property name="content">


                <div class="col-lg-3 col-md-6">


                    <db-cardpanel color="primary">
                        <property name="title">Hélo</property>
                        <property name="subTitle">€ ici ça marche héhéhé</property>
                        <property name="icon">fa-bomb</property>
                    </db-cardpanel>




                </div>


                <div class="col-lg-3 col-md-6">
                    <db-cardpanel>
                        <property name="title">John</property>
                        <property name="subTitle">Doe</property>
                    </db-cardpanel>
                </div>


                <div class="col-lg-3 col-md-6">
                    <db-cardpanel>
                        <property name="color">yellow</property>
                        <property name="title">Hello</property>
                        <property name="subTitle">World</property>
                        <property name="icon">fa-shopping-cart</property>
                    </db-cardpanel>
                </div>


                <div class="col-lg-3 col-md-6">
                    <db-cardpanel>
                        <property name="color">red</property>
                        <property name="title">Hello

                        </property>
                        <property name="subTitle">World</property>
                        <property name="icon">fa-cubes</property>
                    </db-cardpanel>
                </div>



            </property>
        </db-panel>






    </div>
    <!-- /.row -->
    <div class="row">



        <div class="col-lg-8">



            <db-panel>
                <property name="title">Simple panel</property>
                <property name="icon">fa-hand-pointer-o </property>
                <property name="content">
                    Panel content



                    <db-barchart>
                        <property name="title">Exemple bar chart</property>
                        <property name="serie" type="json">
                            {
                            "name": "coucou",
                            "captions": ["Test1","Test2","Test3","Test4","Test5","Test6"],
                            "values" : [5, 20, 36, 10, 10, 20]
                            }
                        </property>
                    </db-barchart>




                </property>
            </db-panel>



            <db-panel>
                <property name="title">
                    My Area Chart Example
                </property>
                <property name="icon">fa-bar-chart-o</property>

                <property name="content">
                    <div id="area-chart" style="height:300px"></div>
                </property>
            </db-panel>




            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                    <div class="pull-right">
                        <db-dropdownmenu>
                            <property  name="title">Menu</property>
                            <property  name="items" type="json">
                                [
                                    {"caption": "Test1", "url": "#"},
                                    {"caption": "Test2", "url": "#"},
                                    {"caption": "Test3", "url": "#"}
                                ]
                            </property>

                        </db-dropdownmenu>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>3326</td>
                                        <td>10/21/2013</td>
                                        <td>3:29 PM</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr>
                                        <td>3325</td>
                                        <td>10/21/2013</td>
                                        <td>3:20 PM</td>
                                        <td>$234.34</td>
                                    </tr>
                                    <tr>
                                        <td>3324</td>
                                        <td>10/21/2013</td>
                                        <td>3:03 PM</td>
                                        <td>$724.17</td>
                                    </tr>
                                    <tr>
                                        <td>3323</td>
                                        <td>10/21/2013</td>
                                        <td>3:00 PM</td>
                                        <td>$23.71</td>
                                    </tr>
                                    <tr>
                                        <td>3322</td>
                                        <td>10/21/2013</td>
                                        <td>2:49 PM</td>
                                        <td>$8345.23</td>
                                    </tr>
                                    <tr>
                                        <td>3321</td>
                                        <td>10/21/2013</td>
                                        <td>2:23 PM</td>
                                        <td>$245.12</td>
                                    </tr>
                                    <tr>
                                        <td>3320</td>
                                        <td>10/21/2013</td>
                                        <td>2:15 PM</td>
                                        <td>$5663.54</td>
                                    </tr>
                                    <tr>
                                        <td>3319</td>
                                        <td>10/21/2013</td>
                                        <td>2:13 PM</td>
                                        <td>$943.45</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.col-lg-4 (nested) -->
                        <div class="col-lg-8">
                            <db-barchart>
                                <property name="title">Exemple bar chart</property>
                                <property name="serie" type="json">
                                    {
                                        "name": "Yolo",
                                        "captions": ["Test1","Test2","Test3","Test4","Test5","Test6"],
                                        "values" : [5, 20, 36, 10, 10, 20]
                                    }

                                </property>
                            </db-barchart>
                            <!--<div id="bar-chart" style="height: 500px;"></div>//-->
                        </div>
                        <!-- /.col-lg-8 (nested) -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge"><i class="fa fa-check"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                    <p><small class="text-muted"><i class="fa fa-clock-o"></i> 11 hours ago via Twitter</small>
                                    </p>
                                </div>
                                <div class="timeline-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero laboriosam dolor perspiciatis omnis exercitationem. Beatae, officia pariatur? Est cum veniam excepturi. Maiores praesentium, porro voluptas suscipit facere rem dicta, debitis.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge warning"><i class="fa fa-credit-card"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem dolorem quibusdam, tenetur commodi provident cumque magni voluptatem libero, quis rerum. Fugiat esse debitis optio, tempore. Animi officiis alias, officia repellendus.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium maiores odit qui est tempora eos, nostrum provident explicabo dignissimos debitis vel! Adipisci eius voluptates, ad aut recusandae minus eaque facere.</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge danger"><i class="fa fa-bomb"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus numquam facilis enim eaque, tenetur nam id qui vel velit similique nihil iure molestias aliquam, voluptatem totam quaerat, magni commodi quisquam.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates est quaerat asperiores sapiente, eligendi, nihil. Itaque quos, alias sapiente rerum quas odit! Aperiam officiis quidem delectus libero, omnis ut debitis!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-badge info"><i class="fa fa-save"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus modi quam ipsum alias at est molestiae excepturi delectus nesciunt, quibusdam debitis amet, beatae consequuntur impedit nulla qui! Laborum, atque.</p>
                                    <hr />
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-gear"></i> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a>
                                            </li>
                                            <li><a href="#">Another action</a>
                                            </li>
                                            <li><a href="#">Something else here</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi fuga odio quibusdam. Iure expedita, incidunt unde quis nam! Quod, quisquam. Officia quam qui adipisci quas consequuntur nostrum sequi. Consequuntur, commodi.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-badge success"><i class="fa fa-graduation-cap"></i>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Lorem ipsum dolor</h4>
                                </div>
                                <div class="timeline-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati, quaerat tempore officia voluptas debitis consectetur culpa amet, accusamus dolorum fugiat, animi dicta aperiam, enim incidunt quisquam maxime neque eaque.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">





            <db-panel>
                <property name="title">Date picker</property>
                <property name="content">


                    <db-datepicker>
                        <property name="notice">MOngooooo !!!</property>
                    </db-datepicker>


                </property>
            </db-panel>





            <db-panel>
                <property name="title">Imbrication
                    <div class="pull-right">
                        <db-dropdownmenu>
                            <property  name="title">DROPDOWNMENU</property>
                        </db-dropdownmenu>
                    </div>
                </property>



                <property name="content">

                    <db-cardpanel>
                        <property name="color">primary</property>
                        <property name="title">Hello</property>
                        <property name="subTitle">
                            <db-dropdownmenu>
                                <property  name="title">DROPDOWNMENU</property>
                            </db-dropdownmenu>
                        </property>
                        <property name="icon">fa-bomb</property>
                    </db-cardpanel>


                    <div class="pull-right">
                        <db-dropdownmenu>
                            <property  name="title">DROPDOWNMENU</property>
                        </db-dropdownmenu>
                    </div>

                    <db-cardpanel>
                        <property name="color">primary</property>
                        <property name="title">Hello</property>
                        <property name="subTitle">CardPanel</property>
                        <property name="icon">fa-bomb</property>
                    </db-cardpanel>



                    <div class="pull-right">
                        <db-dropdownmenu>
                            <property  name="title">DROPDOWNMENU</property>
                        </db-dropdownmenu>
                    </div>

                    <a href="#" class="btn btn-default btn-block">View All Alerts</a>

                </property>
            </db-panel>





            <db-panel>
                <property name="title">Exemple list box</property>
                <property name="content">
                    <db-list>
                        <property name="items" type="json">
                            [
                                {"icon" : "fa-fw", "caption" : "3 New Followers", "legend" : "12 minutes ago"},
                                {"icon" : "fa-fw", "caption" : "3 New Followers", "legend" : "12 minutes ago"},
                                {"icon" : "fa-fw", "caption" : "3 New Followers", "legend" : "12 minutes ago"},
                                {"icon" : "fa-fw", "caption" : "3 New Followers", "legend" : "12 minutes ago"},
                                {"icon" : "fa-fw", "caption" : "3 New Followers", "legend" : "12 minutes ago"}
                            ]
                        </property>
                    </db-list>
                </property>
            </db-panel>




            <db-panel>
                <property name="title">Donut Chart Component</property>
                <property name="content">
                    <db-donutchart></db-donutchart>
                </property>
            </db-panel>





            <?php include(__DIR__.'/chat.php'); ?>


            <db-panel>
                <property name="title">Social buttons</property>
                <property name="content">
                    <?php include(__DIR__.'/social-button.php'); ?>
                </property>
            </db-panel>




            <!-- /.panel .chat-panel -->
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->


































    <script type="text/javascript">


/*

        var myChart = echarts.init(document.getElementById('area-chart'));
        // specify chart configuration item and data
        option = {
            title: {
                text: 'Test radar'
            },
            tooltip: {},
            legend: {
                data: ['S1（Allocated Budget）', 'S2（Actual Spending）']
            },
            radar: {
                // shape: 'circle',
                indicator: [
                    { name: 'Dim1', max: 6500},
                    { name: 'Dim2', max: 16000},
                    { name: 'Dim3', max: 30000},
                    { name: 'Dim4', max: 38000},
                    { name: 'Dim5', max: 52000},
                    { name: 'Dim6', max: 25000}
                ]
            },
            series: [{
                name: 'Budget vs spending）',
                type: 'radar',
                // areaStyle: {normal: {}},
                data : [
                    {
                        value : [4300, 10000, 28000, 35000, 50000, 19000],
                        name : 'Allocated Budget'
                    },
                    {
                        value : [5000, 14000, 28000, 31000, 42000, 21000],
                        name : 'Actual Spending'
                    }
                ]
            }]
        };
        // use configuration item and data specified to show chart
        myChart.setOption(option);
*/

    </script>
