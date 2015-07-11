
    <form action="{{url('configure')}}" method="POST">
        <div class="row">
            <div class="col s6">
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input type="text" value="{{$settings['username']}}" name="username" id="username" >
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input type="password" name="new_psw" id="new_psw" >
                        <label for="new_psw">New password</label>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input type="password" name="old_psw" id="old_psw" >
                        <label for="old_psw">Old password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input type="password" name="re_new_psw" id="re_new_psw" >
                        <label for="re_new_psw">Repeat new password</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s6">
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input type="number" min="10" value="{{$settings['volume']}}" max="32000" name="volume" id="volume" >
                        <label for="volume">Drink max volume(cL)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s10 offset-s1">
                        <input type="number" min="15" value="{{$settings['timeout_time']}}" max="3600" name="timeout_time" id="timeout_time" >
                        <label for="timeout_time">Timeout time(seconds)</label>
                    </div>
                </div>
            </div>
            <div class="col s6">
                <div class="row">
                    <div class="col s10 offset-s1">
                        <label>Start method</label>
                        <select name="start_method" class="browser-default">
                            <option value="0">Auto</option>
                            <option value="1">Button</option>
                            <option value="2">Coin</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col s10 offset-s1">
                        <label>Default order status</label>
                        <select name="initial_status" class="browser-default">
                            <option value="0">To be approved</option>
                            <option value="1">Approved</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col offset-s8 s3">
                <button type="submit" class="btn waves-effect waves-light">
                    <i class="mdi-content-send right"></i>
                    Save
                </button>
            </div>
        </div>
    </form>