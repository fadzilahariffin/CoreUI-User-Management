$(function(){"use strict";var a=function(){return Math.round(100*Math.random())},o={labels:["January","February","March","April","May","June","July"],datasets:[{label:"My First dataset",backgroundColor:"rgba(220,220,220,0.2)",borderColor:"rgba(220,220,220,1)",pointBackgroundColor:"rgba(220,220,220,1)",pointBorderColor:"#fff",data:[a(),a(),a(),a(),a(),a(),a()]},{label:"My Second dataset",backgroundColor:"rgba(151,187,205,0.2)",borderColor:"rgba(151,187,205,1)",pointBackgroundColor:"rgba(151,187,205,1)",pointBorderColor:"#fff",data:[a(),a(),a(),a(),a(),a(),a()]}]},r=document.getElementById("canvas-1"),a=(new Chart(r,{type:"line",data:o,options:{responsive:!0}}),function(){return Math.round(100*Math.random())}),e={labels:["January","February","March","April","May","June","July"],datasets:[{backgroundColor:"rgba(220,220,220,0.5)",borderColor:"rgba(220,220,220,0.8)",highlightFill:"rgba(220,220,220,0.75)",highlightStroke:"rgba(220,220,220,1)",data:[a(),a(),a(),a(),a(),a(),a()]},{backgroundColor:"rgba(151,187,205,0.5)",borderColor:"rgba(151,187,205,0.8)",highlightFill:"rgba(151,187,205,0.75)",highlightStroke:"rgba(151,187,205,1)",data:[a(),a(),a(),a(),a(),a(),a()]}]},r=document.getElementById("canvas-2"),t=(new Chart(r,{type:"bar",data:e,options:{responsive:!0}}),{labels:["Red","Green","Yellow"],datasets:[{data:[300,50,100],backgroundColor:["#FF6384","#36A2EB","#FFCE56"],hoverBackgroundColor:["#FF6384","#36A2EB","#FFCE56"]}]}),r=document.getElementById("canvas-3"),n=(new Chart(r,{type:"doughnut",data:t,options:{responsive:!0}}),{labels:["Eating","Drinking","Sleeping","Designing","Coding","Cycling","Running"],datasets:[{label:"My First dataset",backgroundColor:"rgba(220,220,220,0.2)",borderColor:"rgba(220,220,220,1)",pointBackgroundColor:"rgba(220,220,220,1)",pointBorderColor:"#fff",pointHighlightFill:"#fff",pointHighlightStroke:"rgba(220,220,220,1)",data:[65,59,90,81,56,55,40]},{label:"My Second dataset",backgroundColor:"rgba(151,187,205,0.2)",borderColor:"rgba(151,187,205,1)",pointBackgroundColor:"rgba(151,187,205,1)",pointBorderColor:"#fff",pointHighlightFill:"#fff",pointHighlightStroke:"rgba(151,187,205,1)",data:[28,48,40,19,96,27,100]}]}),r=document.getElementById("canvas-4"),l=(new Chart(r,{type:"radar",data:n,options:{responsive:!0}}),{labels:["Red","Green","Yellow"],datasets:[{data:[300,50,100],backgroundColor:["#FF6384","#36A2EB","#FFCE56"],hoverBackgroundColor:["#FF6384","#36A2EB","#FFCE56"]}]}),r=document.getElementById("canvas-5"),d=(new Chart(r,{type:"pie",data:l,options:{responsive:!0}}),{datasets:[{data:[11,16,7,3,14],backgroundColor:["#FF6384","#4BC0C0","#FFCE56","#E7E9ED","#36A2EB"],label:"My dataset"}],labels:["Red","Green","Yellow","Grey","Blue"]}),r=document.getElementById("canvas-6");new Chart(r,{type:"polarArea",data:d,options:{responsive:!0}})});