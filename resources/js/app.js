import './bootstrap';
import $ from 'jquery';
import axios from 'axios';
$("#registrationForm").submit(function(e){
    e.preventDefault(); 
    $.ajax({
        url: '/register',
        type: 'post',
        data:  new FormData(this),
        contentType: false,
        processData: false,
        success: function(response){
            alert(response.msg)
        },
    });
});
$("#loginForm").submit(function(e){
    e.preventDefault(); 
    $.ajax({
        url: '/authenticate',
        type: 'post',
        data:  new FormData(this),
        contentType: false,
        processData: false,
        success: function(response){
            if(response.status == 200){
                location.href='/'
            }else{
                alert(response.msg)
            }
        },
    });
});
$("#addTaskForm").submit(function(e){
    e.preventDefault(); 
    $.ajax({
        url: '/store',
        type: 'post',
        data:  new FormData(this),
        contentType: false,
        processData: false,
        success: function(response){
            alert(response.msg)
        },
    });
});
$("#editTaskForm").submit(function(e){
    e.preventDefault(); 
    $.ajax({
        url: '/update',
        type: 'post',
        data:  new FormData(this),
        contentType: false,
        processData: false,
        success: function(response){
            if(response.status == 200){
                location.href='/'
            }else{
                alert(response.msg)
            }
        },
    });
});