@extends('admin.layout.master')

@section('title', 'Pesan Masuk')
@section("content")
    <!DOCTYPE html>
<html>
<head>
    <title>Telegram Desktop Chat</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e1e1e1;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
            padding: 10px;
            box-sizing: border-box;
        }
        .header {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
        }
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .user-info {
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .user-name {
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
        .status {
            font-size: 14px;
            margin: 0;
        }
        .actions {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f2f2f2;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .actions:hover {
            background-color: #d9d9d9;
        }
        .actions i {
            color: #555;
            font-size: 20px;
            line-height: 1;
        }
        .chat-box {
            display: flex;
            flex-direction: column;
            flex: 1;
            background-color: #fff;
            padding: 10px;
            overflow-y: auto;
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.2);
        }
        .message {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .message.from-me {
            align-self: flex-end;
            background-color: #dcf8c6;
        }
        .message.from-me::after {
            content: '';
            display: block;
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-left: 10px solid #dcf8c6;
            border-bottom: 10px solid transparent;
            position: absolute;
            top: 0;
            right: -10px;
        }
        .message.from-other {
            align-self: flex-start;
            background-color: #f2f2f2;
        }
        .message.from-other::after {
            content: '';
            display: block;
            width: 0;
            height: 0;
            border-top	: 10px solid transparent;
            border-right: 10px solid #f2f2f2;
            border-bottom: 10px solid transparent;
            position: absolute;
            top: 0;
            left: -10px;
        }
        .message .sender {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .message .text {
            font-size: 16px;
            margin: 0;
        }
        .input-box {
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            box-shadow: 0px -1px 2px rgba(0, 0, 0, 0.2);
        }
        .input-box input {
            flex: 1;
            border: none;
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 20px;
            margin-right: 10px;
            font-size: 16px;
            color: #555;
        }
        .input-box input:focus {
            outline: none;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }
        .input-box button {
            background-color: #0088cc;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .input-box button i {
            font-size: 20px;
            line-height: 1;
        }
        .input-box button:hover {
            background-color: #005580;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img class="avatar" src="https://via.placeholder.com/50x50" alt="User Avatar">
        <div class="user-info">
            <p class="user-name">John Doe</p>
            <p class="status">Online</p>
        </div>
        <div class="actions"><i class="fa fa-ellipsis-v"></i></div>
    </div>
    <div class="chat-box">
        <div class="message from-other">
            <p class="sender">Jane Doe</p>
            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent efficitur ex sed malesuada tincidunt. Nullam lobortis purus et dui luctus pharetra. Curabitur nec lobortis sapien. Fusce sit amet mollis ex, quis semper mi. Vivamus vel facilisis purus. Duis at lacinia massa, ac gravida velit. Aenean in massa euismod, posuere sapien vitae, bibendum metus. Donec euismod erat vel tincidunt malesuada. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
        </div>
        <div class="message from-me">
            <p class="sender">You</p>
            <p class="text">Donec vel suscipit lorem. Vestibulum bibendum sapien sit amet metus laoreet, a blandit turpis malesuada. Fusce eu purus eget lorem placerat maximus. Nullam ac bibendum nunc. Sed ullamcorper augue vitae nisi faucibus, vel euismod odio suscipit. Suspendisse eget ex a ipsum cursus maximus nec ac massa. Aliquam nec nulla semper, pellentesque sapien sed, luctus elit. Nunc in ipsum ac massa ultrices imperdiet eu nec turpis. Sed id dolor bibendum, suscipit mi vel, hendrerit sapien. Praesent mattis nisi et nulla sagittis, sit amet mollis metus sagittis. Quisque vestibulum felis at leo ornare, in elementum neque bibendum. Donec ut sapien pharetra, efficitur velit id, auctor libero. Pellentesque lobortis, lectus in lobortis fermentum, orci elit ultrices mauris, ut molestie arcu purus vel metus. Suspendisse vitae rutrum tellus. </p>
        </div>
        <div class="message from-other">
            <p class="sender">Jane Doe</p>
            <p class="text">Nulla facilisi. Sed sit amet erat erat. Aliquam vel aliquam ante. Donec molestie sodales turpis vitae euismod. Nulla facilisi. Nulla nec suscipit lacus. Vivamus in eros euismod, fermentum nisi id, lacinia metus. Suspendisse ultricies dolor et sapien bibendum vestibulum. Praesent aliquet gravida metus, eget dapibus tellus auctor ac. Sed finibus nibh eu eros faucibus venenatis. Nullam condimentum nunc eu risus feugiat, vitae tristique lectus scelerisque. Ut ac enim nec quam bibendum facilisis. Nam ac mauris id tellus convallis placerat eu eget tellus. </p>
        </div>
        <div class="message from-me">
            <p class="sender">You</p>
            <p class="text">Sed mollis dui eu mi bibendum, vel facilisis mauris imperdiet. Proin vitae neque vel tortor sodales dictum vitae in massa. Vestibulum ut lorem at odio ultrices consequat vel ut velit. Nunc consequat malesuada eros, sit amet tempor odio rutrum vel. Nunc ut posuere enim, at interdum enim. Duis luctus augue nec nunc viverra, ac sollicitudin eros tincidunt. Sed et varius nisl. </p>
        </div>
        <div class="message from-other">
            <p class="sender">Jane Doe</p>
            <p class="text">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse potenti. In non nisl ac velit tempor tincidunt. Suspendisse laoreet sagittis orci, at vestibulum sapien euismod et. Pellentesque venenatis, nunc eget luctus vulputate, arcu tellus vestibulum lorem, at sagittis magna mi ut nisi. Fusce ac diam lacus. Donec tempor metus euismod enim suscipit, ac efficitur mi dictum. Sed malesuada, felis nec bibendum semper, quam leo iaculis massa, eget venenatis elit massa sed justo. </p>
        </div>
        <div class="message from-me">
            <p class="sender">You</p>
            <p class="text">Suspendisse ac ex gravida, varius velit nec, dignissim nulla. Pellentesque ac risus ut sapien fringilla rhoncus. Duis aliquet sapien eu mi ullamcorper, sit amet pretium lectus imperdiet. Praesent ultrices eros ut velit rhoncus, vitae malesuada ipsum semper. Sed in velit ut turpis malesuada facilisis vel eget ipsum. Integer nec lacus vel mi faucibus dictum. Fusce sit amet risus vel urna ornare condimentum. </p>
        </div>
        <div class="message from-me">
            <p class="sender">You</p>
            <p class="text">Mauris varius, dolor vel pretium posuere, metus elit malesuada mauris, quis ultricies massa libero ut nibh. Integer a lacinia velit. Vivamus congue nisi ut diam ullamcorper convallis. Pellentesque et felis id velit pulvinar efficitur quis sit amet odio. Sed ac risus et risus luctus finibus non non mi. Donec semper, odio non dapibus vehicula, ipsum sapien venenatis eros, ut fermentum arcu dui non massa. </p>
        </div>
        <div class="message from-other">
            <p class="sender">Jane Doe</p>
            <p class="text">Nulla tristique justo id erat ultrices, quis fringilla est ultricies. Nam bibendum interdum odio eu cursus. Etiam tincidunt euismod elit a suscipit. Integer efficitur turpis justo, eu sollicitudin libero bibendum in. Suspendisse tempor dictum dolor ac dictum. Praesent posuere malesuada semper. Vivamus sit amet metus malesuada, efficitur massa quis, pellentesque sapien. </p>
        </div>
    </div>
    <div class="input-container">
        <div class="input-group">
            <textarea class="form-control input-message" placeholder="Type your message"></textarea>
            <button class="btn btn-primary send-button">Send</button>
        </div>
    </div>
</div>

</body>
</html>

@endsection
