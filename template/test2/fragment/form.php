<!-- Forms
================================================== -->
<div class="bs-docs-section">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h1 id="forms">Forms</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="well bs-component">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Legend</legend>

                        <div class="form-group">
                            <label for="inputEmail" class="col-md-2 control-label">Email</label>
                            <div class="col-md-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="inputPassword" class="col-md-2 control-label">Password</label>

                            <div class="col-md-10">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password">

                                <!--
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox"> Checkbox
                                  </label>
                                  <label>
                                    <input type="checkbox" disabled> Disabled Checkbox
                                  </label>
                                </div>
                                <br>

                                <div class="togglebutton">
                                  <label>
                                    <input type="checkbox" checked> Toggle button
                                  </label>
                                </div>
                                -->
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 0;"> <!-- inline style is just to demo custom css to put checkbox below input above -->
                            <div class="col-md-offset-2 col-md-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Checkbox
                                    </label>
                                    <label>
                                        <input type="checkbox" disabled> Disabled Checkbox
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <div class="togglebutton">
                                    <label>
                                        <input type="checkbox" checked> Toggle button
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputFile" class="col-md-2 control-label">File</label>

                            <div class="col-md-10">
                                <input type="text" readonly class="form-control" placeholder="Browse...">
                                <input type="file" id="inputFile" multiple>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="textArea" class="col-md-2 control-label">Textarea</label>

                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" id="textArea"></textarea>
                                <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Radios</label>

                            <div class="col-md-10">
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                        Option one is this
                                    </label>
                                </div>
                                <div class="radio radio-primary">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                        Option two can be something else
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select111" class="col-md-2 control-label">Select</label>

                            <div class="col-md-10">
                                <select id="select111" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="select222" class="col-md-2 control-label">Select Multiple</label>

                            <div class="col-md-10">
                                <select id="select222" multiple="" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-2">
                                <button type="button" class="btn btn-default">Cancel</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-1">

            <form class="bs-component">
                <div class="form-group label-floating">
                    <label class="control-label" for="focusedInput1">Write something to make the label float</label>
                    <input class="form-control" id="focusedInput1" type="text">
                </div>

                <div class="form-group label-floating">
                    <label class="control-label" for="focusedInput2">Focus to show the help-block</label>
                    <input class="form-control" id="focusedInput2" type="text">
                    <p class="help-block">You should really write something here</p>
                </div>

                <div class="form-group">
                    <label class="control-label" for="disabledInput">Disabled input</label>
                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
                </div>

                <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning">Input warning</label>
                    <input type="text" class="form-control" id="inputWarning">
                </div>

                <div class="form-group has-error">
                    <label class="control-label" for="inputError">Input error</label>
                    <input type="text" class="form-control" id="inputError">
                </div>

                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Input success</label>
                    <input type="text" class="form-control" id="inputSuccess">
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputLarge">Large input</label>
                    <input class="form-control input-lg" type="text" id="inputLarge">
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputDefault">Default input</label>
                    <input type="text" class="form-control" id="inputDefault">
                </div>

                <div class="form-group">
                    <label class="control-label" for="inputSmall">Small input</label>
                    <input class="form-control input-sm" type="text" id="inputSmall">
                </div>

                <div class="form-group">
                    <label class="control-label" for="addon1">Default label w/input addons</label>
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input type="text" id="addon1" class="form-control">
                        <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">Button</button>
              </span>
                    </div>
                </div>

                <div class="form-group label-floating">
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <label class="control-label" for="addon3a">Floating label w/2 addons</label>
                        <input type="text" id="addon3a" class="form-control">
                        <p class="help-block">The label is inside the <code>input-group</code> so that it is positioned properly as a placeholder.</p>
                        <span class="input-group-btn">
                <button type="button" class="btn btn-fab btn-fab-mini">
	                <i class="material-icons">send</i>
                </button>
              </span>
                    </div>
                </div>

                <div class="form-group label-floating">

                    <label class="control-label" for="addon2">Floating label w/right addon</label>
                    <div class="input-group">
                        <input type="text" id="addon2" class="form-control">
                        <span class="input-group-btn">
                <button type="button" class="btn btn-fab btn-fab-mini">
	                <i class="material-icons">functions</i>
                </button>
              </span>
                    </div>
                </div>

                <div class="form-group">
                    <input type="file" id="inputFile4" multiple>
                    <div class="input-group">
                        <input type="text" readonly class="form-control" placeholder="Placeholder w/file chooser...">
                        <span class="input-group-btn input-group-sm">
                  <button type="button" class="btn btn-fab btn-fab-mini">
	                  <i class="material-icons">attach_file</i>
                  </button>
                </span>
                    </div>
                </div>


            </form>

        </div>
    </div>
</div>