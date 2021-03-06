<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/Xixiu/Application/Home/View/Public/Pump/css/common.css">
    <link rel="stylesheet" href="/Xixiu/Application/Home/View/Public/layui/css/layui.css">
    <link rel="stylesheet" href="/Xixiu/Application/Home/View/Public/Pump/css/home.css">
    <title>泵站主页面</title>
</head>
<body>
<div class="pumpbg">
    <div class="pool1_data poolframe">
        <form class="layui-form data_text" action="">
            缓冲水池：<br/>
            <!-- <p class="data_text"></p> -->
            水位：<span class="data_head">0.5M</span><br/>浊度：<span class="data_head">30mg/L</span><br/>
        </form>
    </div>
    <div class="pool2_data poolframe">
        <form class="layui-form data_text" action="">
            原水池：<br/>
            <!-- <p class="data_text"></p> -->
            水位：<span class="data_head" style="color: darkred">0.3M</span><br/>浊度：<span class="data_head">30mg/L</span><br/>
        </form>
    </div>
    <div class="pool3_data poolframe">
        <form class="layui-form data_text" action="">
            污水池：<br/>
            水位：<span class="data_head">0.5M</span><br/>浊度：<span class="data_head">30mg/L</span><br/>
        </form>
    </div>
    <div class="valve_data dataframe">
        <form class="layui-form data_text" action="">
            <p class="data_head">水阀：</p><br/>
            自动控制：<input type="checkbox" name="close" lay-skin="switch" lay-filter="controlValve" lay-text="是|否"><br/>&nbsp;<br/>
            <div id="valve_btn">
                状&nbsp;&nbsp;态&nbsp;&nbsp;：<input type="checkbox" name="close" lay-skin="switch" lay-filter="switchValve" lay-text="开启|关闭"></div>
            <span id="valve_status">状&nbsp;&nbsp;态&nbsp;&nbsp;：关</span>
            <span class="data_text">
					<br/>开&nbsp;&nbsp;度&nbsp;&nbsp;：0%；<br/>流量系数KV：50；
            </span>
        </form>
    </div>
    <div class="tap_data dataframe">
        <form class="layui-form data_text" action="">
            <p class="data_head">水管：</p>
            <p class="data_text"><br/>出水压力：1.2Mpa;<br/>&nbsp;<br/>出水流量：30L/S;</p>
        </form>
    </div>
    <div class="pump_data dataframe">
        <form class="layui-form data_text" action="">
            <p class="data_head">水泵：</p>
            <br/>
            自动控制：<input type="checkbox" name="close" lay-skin="switch" lay-filter="controlPump" lay-text="是|否"><br/>&nbsp;<br/>
            <div id="pump_btn">
                状&nbsp;&nbsp;态&nbsp;&nbsp;：<input type="checkbox" name="close" lay-skin="switch" lay-filter="switchPump"  lay-text="开启|关闭"></div>
            <span id="pump_status">状&nbsp;&nbsp;态&nbsp;&nbsp;：关</span>
            <span class="data_text">
					<br/>累计工作时间：20h;<br/>功&nbsp;&nbsp;率&nbsp;&nbsp;：1.5KW；<br/>流&nbsp;&nbsp;量&nbsp;&nbsp;：15-720m3/h;<br/>杨&nbsp;&nbsp;程&nbsp;&nbsp;：5-45m；
				</span>
        </form>
    </div>
</div>
<script src="/Xixiu/Application/Home/View/Public/layui/layui.js" charset="utf-8"></script>
<script src="/Xixiu/Application/Home/View/Public/plug/jquery.js"></script>
<script>
    layui.use('form', function () {
        var form = layui.form;//只有执行了这一步，部分表单元素才会自动修饰成功但是，如果你的HTML是动态生成的，自动渲染就会失效，因此你需要在相应的地方，执行下述方法来手动渲染，跟这类似的还有 element.init();
        form.render();//监听指定开关

        //监听水阀自动控制按钮——controlValve为按钮的lay-filter的值
        form.on('switch(controlValve)', function (data) {
            layer.tips('水阀自动控制：' + (this.checked ? '是' : '否'), data.othis);
            data.value = this.checked ? 'on' : 'off';
            console.log(data.value);
            if (data.value == 'on') {
                $('#valve_btn').css('display', 'none');
                $('#valve_status').css('display', 'inline');
            } else {
                $('#valve_btn').css('display', 'inline');
                $('#valve_status').css('display', 'none');
            }
            ;
        });
        //监听水阀按钮
        form.on('switch(switchValve)', function (data) {
            layer.tips('水阀开关：' + (this.checked ? '开启' : '关闭'), data.othis);// layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
        });

        //监听水泵自动控制按钮
        form.on('switch(controlPump)', function (data) {
            layer.tips('水泵自动控制：' + (this.checked ? '是' : '否'), data.othis);
            data.value = this.checked ? 'on' : 'off';
            console.log(data.value);
            if (data.value == 'on') {
                $('#pump_btn').css('display', 'none');
                $('#pump_status').css('display', 'inline');
            } else {
                $('#pump_btn').css('display', 'inline');
                $('#pump_status').css('display', 'none');
            }
            ;
        });
        //监听水泵按钮
        form.on('switch(switchPump)', function (data) {
            layer.tips('水泵开关：' + (this.checked ? '开启' : '关闭'), data.othis);
        });


    });

</script>
</body>
</html>