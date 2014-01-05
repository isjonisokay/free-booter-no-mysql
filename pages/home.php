        <div class="container">
            <div class="jumbotron">
                <div class="thumbnail">
                    <blockquote>
                      <h1>Fire your laz0rs</h1>
                      <small>a simple botw44 booter</small>
                    </blockquote>
                </div>

                <div class="error"></div>

                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <div class="form-group">
                                    <label for="inputIp">IP</label>
                                    <input type="text" class="booterIP form-control" id="inputIp" placeholder="enter ip">
                                </div>
                                <div class="form-group">
                                    <label for="inputPort">Port</label>
                                    <input type="text" class="booterPort form-control" id="inputPort" placeholder="enter port (for tcp)">
                                </div>
                                <button type="submit" class="booterSave btn btn-default">Save</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    $handle = null;
                    if($handle = opendir("lists/")) {
                        while(false !== ($entry = readdir($handle))) {
                            if($entry!="."&&$entry!="..")
                                echo '
                                    <div class="col-sm-6 col-md-4">
                                        <div class="thumbnail">
                                            <div class="caption">
                                                <p>'.$entry.'</p>
                                                <div class="btn-group">
                                                    <button type="button" class="booterStart btn btn-success btn-lg" name="'.$entry.'">
                                                        Start
                                                    </button>
                                                    <button type="button" class="booterStop btn btn-danger btn-lg" name="'.$entry.'">
                                                        Stop
                                                    </button>
                                                </div>
                                                <br />
                                                <br />
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" name="'.$entry.'"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                        }
                        closedir($handle);
                    }
                    ?>
                </div>

            </div>
        </div>
