<{extends file='header.tpl'}><{block name="title" prepend}>邀请码 - <{/block}><{* 继承内容到父模板 *}><{block name="contents"}>
<style>
          body { 
                  background-color: rgba(0, 168, 255, 0.56);
                  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RTE3MUZDMzc2OUQwMTFFMzg3RkNENUMxREE0MjcxMzciIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RTE3MUZDMzY2OUQwMTFFMzg3RkNENUMxREE0MjcxMzciIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNS4xIE1hY2ludG9zaCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjE2OUUxRDlFNkZGMTExRTFBQjBCODVFNEE2MzdFRDhGIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkY1QTRERkEwNkZGMTExRTFBQjBCODVFNEE2MzdFRDhGIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+5Xmx/AAAAF5JREFUeNrsztsJgFAMwNDWFyIiCOL+m1aXEOM1gfyfjIgzwOX9QQfudOBGB6504EIHznTgRAeOdOAgsHVgL1Dgy8BOoECBAp8FpkCBAj8MtObLqhIoUKDAPwMvAQYAhqcYrJBlYv8AAAAASUVORK5CYII="), 
                  url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPAAAADwCAMAAAAJixmgAAAAV1BMVEUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAOl5NtAAAAHXRSTlMAAQIDBAUGBwgJCgsNDg8QERITFBUWFxgaGxweH2sKGvYAAAGrSURBVHja7d1LVgIxEIZRFNBWedkI4mP/63QF/Q3I0PtP+yRdN9M6lay+M7upcnyvTOvK+Va5nCv718rztrICBgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGBgZeAOfO58OuMufap1Vls70/b1nVNv8LDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAx8H7gXH3PtMcva59eu6mPgKzAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAw8BI4Zx5vpyxr3X3J3PmaZXWb9po7//xWgIGBgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGBl8DdmHzJocfTQLu0BzU3eZSPeQnsfqQ/DAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAz8j8FZ1e6Wz0B2y7Ovaj3k2n5+cs6aL9lMBQYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGXgL3k4oPA4819nOM08B/+zw+u10KDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAx817DlV259GrhQdeSq1nlgyBMYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGBgYGHghf17hUDsBOM8+AAAAAElFTkSuQmCC");
                  background-position: 0 0, 0 50%;
                  background-repeat: repeat-x, repeat;
                }
        </style>
<div class="had-container">
   <{include file='nav.tpl'}>
<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <div class="row card-panel grey lighten-4 z-depth-3">
            <div class="row center">
            <h5 class="header col s12 light">
            	<p> 邀请码不定时发放！</p>
            	<p>如遇到无邀请码请找已经注册的用户获取。</p>
            </h5>
            </div>
        </div>
    </div>
</div>

  <div class="container">
    <div class="section">
      <div class="row card-panel no-padding-panel light-blue lighten-5 z-depth-2">
        <{if count($datas)!=null}><{* 如果有邀请码就显示，没有就显示文字。*}>
                <table class="centered striped responsive-table hoverable">
                        <thead>
                        <tr>
                            <th>###</th>
                            <th>邀请码</th>
                            <th>状态</th>
                        </tr>
                        </thead>
                        <tbody>
                        <{foreach $datas as $data}>
                        <tr>
                            <td><{$a++}></td>
                             <td><{$data['code']}></td>
                            <td>可用</td>
                        </tr>
                        <{/foreach}>
                        </tbody>
                    </table>
        <{else}>
                <div class="section no-pad-bot hoverable">
                    <div class="container ">
                            <div class="row center">
                            <h5 class="header col s12 light">
                                <p>没有邀请码啊。。。 (>_<)</p>
                            </h5>
                            </div>
                    </div>
                </div>
        <{/if}>
      </div>
    </div>
  </div>
</div>
<{include file='footer.tpl'}><{/block}>