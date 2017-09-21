@extends('layout')
@section('content')
    <head>
        <style>
            /* Basic Grey */
            .basic-grey {
                margin-left:auto;
                margin-right:auto;
                max-width: 500px;
                background: #F7F7F7;
                padding: 25px 15px 25px 10px;
                font: 12px Georgia, "Times New Roman", Times, serif;
                color: #888;
                text-shadow: 1px 1px 1px #FFF;
                border:1px solid #E4E4E4;
            }
            .basic-grey h1 {
                font-size: 25px;
                padding: 0px 0px 10px 40px;
                display: block;
                border-bottom:1px solid #E4E4E4;
                margin: -10px -15px 30px -10px;;
                color: #888;
            }
            .basic-grey h1>span {
                display: block;
                font-size: 11px;
            }
            .basic-grey label {
                display: block;
                margin: 0px;
            }
            .basic-grey label>span {
                float: left;
                width: 20%;
                text-align: right;
                padding-right: 10px;
                margin-top: 10px;
                color: #888;
            }
            .basic-grey input[type="text"], .basic-grey input[type="email"], .basic-grey textarea, .basic-grey select {
                border: 1px solid #DADADA;
                color: #888;
                height: 30px;
                margin-bottom: 16px;
                margin-right: 6px;
                margin-top: 2px;
                outline: 0 none;
                padding: 3px 3px 3px 5px;
                width: 70%;
                font-size: 12px;
                line-height:15px;
                box-shadow: inset 0px 1px 4px #ECECEC;
                -moz-box-shadow: inset 0px 1px 4px #ECECEC;
                -webkit-box-shadow: inset 0px 1px 4px #ECECEC;
            }
            .basic-grey textarea{
                padding: 5px 3px 3px 5px;
            }
            .basic-grey select {
                background: #FFF url('down-arrow.png') no-repeat right;
                background: #FFF url('down-arrow.png') no-repeat right);
                appearance:none;
                -webkit-appearance:none;
                -moz-appearance: none;
                text-indent: 0.01px;
                text-overflow: '';
                width: 70%;
                height: 35px;
                line-height: 25px;
            }
            .basic-grey textarea{
                height:100px;
            }
            .basic-grey .button {
                background: #E27575;
                border: none;
                padding: 10px 25px 10px 25px;
                color: #FFF;
                box-shadow: 1px 1px 5px #B6B6B6;
                border-radius: 3px;
                text-shadow: 1px 1px 1px #9E3F3F;
                cursor: pointer;
            }
            .basic-grey .button:hover {
                background: #CF7A7A
            }
        </style>
    </head>
<section class="wrapper">
    <form action="" method="post" class="STYLE-NAME">
        <h1>Contact Form
            <span>Please fill all the texts in the fields.</span>
        </h1>
        <label>
            <span>Your Name :</span>
            <input id="name" type="text" name="name" placeholder="Your Full Name" />
        </label>
        <label>
            <span>Your Email :</span>
            <input id="email" type="email" name="email" placeholder="Valid Email Address" />
        </label>
        <label>
            <span>Message :</span>
            <textarea id="message" name="message" placeholder="Your Message to Us"></textarea>
        </label>
        <label>
            <span>Subject :</span><select name="selection">
                <option value="Job Inquiry">Job Inquiry</option>
                <option value="General Question">General Question</option>
            </select>
        </label>
        <label>
            <span>&nbsp;</span>
            <input type="button" class="button" value="Send" />
        </label>
    </form>


</section>
@stop