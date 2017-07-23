<div class="change-nickname">
        <div id="pt1" class="cl">
                <div class="hd-r"></div>
                <div class="z"><div class="nickname-title">修改昵称</div></div>
                <div class="bnav-wrap">
                    <div id="bnav">
                        <a href="javascript:;" id="qmenu" onmouseover="showMenu({'ctrlid':'qmenu','pos':'34!','ctrlclass':'a','duration':2});">快捷导航</a>
                        <a href="javascript:;" onclick="widthauto(this)" id="widthauto-btn" class="y widthauto-btn">切换到宽版</a>
                    </div>
                </div>
            </div>        
        	
            <div class="nickname-content">
            <form id="nickname_form" action="home.php?mod=spacecp&amp;ac=profile&amp;op=changenickname" method="post" target="frame_profile" autocomplete="off">
                	<div>
                    	<span>当前昵称：</span> <span style="color:#c00;">17173玩家_185972298</span>
                    </div>
                    <div>
                    	<span id="th_nickname">修改昵称：</span> <input type="text" name="nickname" style="border:1px solid #aaa; width:140px; height:22px; line-height:22px; padding:0 3px;"> 您有一次修改昵称的机会,昵称长度6-14个字符
                        <br>
                        <span class="error" id="showerror_nickname" style="color:#c00; padding-left:73px; padding-top:3px;">

                        </span>
                    </div>
                    <input type="hidden" name="referer" value="http://bbs.17173.com/forum.php">
                    <input type="hidden" value="12607941" name="formhash">
                    <input type="hidden" name="nicknamesubmit" value="true">
<div style="padding-left:73px;">	<button type="submit" name="changenicknamebtn" id="changenicknamebtn" value="true" class="pn pnc"><strong>确认</strong></button>
<span id="submit_result" class="rq"></span>
                    </div>
                </form>
            </div>
        </div>