<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>QQ小工具 - Adesign</title>
        <link rel="icon" href="/assets/agbbr-hme2n-001.ico" type="image/x-icon">
        <link rel="stylesheet" href="/assets/Layui/libs/layui/css/layui.css" />
        <link rel="stylesheet" href="/assets/frame/module/admin.css?v=318" />
        <style>
            .user-bd-list-item {
            padding: 14px 60px 14px 10px;
            border-bottom: 1px solid #e8e8e8;
            position: relative;
        }
    
        .user-bd-list-item .user-bd-list-lable {
            color: #333;
            margin-bottom: 4px;
        }
    
        .user-bd-list-item .user-bd-list-oper {
            position: absolute;
            top: 50%;
            right: 10px;
            margin-top: -8px;
            cursor: pointer;
        }
    
        .user-bd-list-item .user-bd-list-img {
            width: 48px;
            height: 48px;
            line-height: 48px;
            position: absolute;
            top: 50%;
            left: 10px;
            margin-top: -24px;
        }
        
        .user-bd-list-item .user-bd-list-img + .user-bd-list-content {
            margin-left: 68px;
        }
        </style>
    </head>
    <body layadmin-themealias="dark-blue" style="margin-top: 1em;">
        <div class="layui-fluid">
            <div class="a layui-anim layui-anim-fadein">
                <div class="layui-row layui-col-space15">
                    <div class="layui-col-sm8 layui-col-sm-offset2 layui-col-md6  layui-col-md-offset3 layui-col-lg6 layui-col-xs12  layui-col-lg-offset3">
                        <div class="layui-row layui-col-space15">
                            <div class="layui-col-md12">
                                <div class="layui-card">
                                    <div class="layui-card-header">Q Q 小工具</div>
                                    <div class="layui-card-body">
                                        <div class="layui-form" wid100 lay-filter="">
                                            <div class="layui-form-item">
                                                <select id="type" name="type" lay-verify="required">
                                                    <option value="talk">强制对话</option>
                                                    <option value="data">查看名片</option>
                                                    <option value="qtapi">空间说说</option>
                                                </select>
                                            </div>
                                            <div class="layui-form-item">
                                                <input type="text" id="qq" name="qq" class="layui-input" lay-verType="tips" lay-tips="输入QQ账号！" placeholder="请输入需要对话的QQ号" />
                                            </div>
                                            <div class="layui-form-item">
                                                <button class="layui-btn layui-btn-normal layui-btn-fluid" id="tools">确定操作</button>
                                            </div>
                                            <table class="layui-table" id="table" lay-filter="table"></table>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-col-md12">
                                    <div class="layui-card">
                                        <div class="layui-card-header">英雄个性语音</div>
                                        <div class="layui-card-body">
                                            <div class="layui-form" wid100 lay-filter="">
                                                <div class="layui-form-item">
                                                    <input type="text" id="name" name="name" class="layui-input" lay-verType="tips" lay-tips="英雄名称！" placeholder="请输入需要查询的英雄名称" />
                                                </div>
                                                <div class="layui-form-item">
                                                    <d id="state">
                                                        <button class="layui-btn layui-btn-normal layui-btn-fluid" id="query">立即查询</button>
                                                    </d>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="layui-col-md12" id="show" style="display: none">
                                        <div class="layui-card">
                                            <div class="layui-card-header">
                                                <p align="left" style="float:left" id="site"></p>
                                                <p align="right">
                                                    <button class="layui-btn layui-btn-xs" id="image">查看图像</button>
                                                </p>
                                            </div>
                                            <div class="layui-card-body">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <div id="links">
                                                            <table class="layui-table" lay-size="sm" lay-skin="nob">
                                                                <tbody id="kingTable"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 100%;text-align: center;"></br><center>
                                    Copyright © 2016-2022. <span><a href="https://guoaguoa.com">Adesign</a></span>
                                    </center>         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/assets/jQuery/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="/assets/frame/libs/layui/layui.js"></script>
        <script type="text/javascript" src="/assets/frame/js/common.js?v=318"></script>
        <script type="text/javascript" src="/assets/frame/js/query.js"></script>
    </body>
</html>