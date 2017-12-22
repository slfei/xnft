       var http =require("http");
	   var app =http.createServer((res,req)=>{
	   	  //req 拿到前端传递过来的数据
	   	  //res 给前端发送的数据
	   	  res.writeHead(200,{'Content-Type':'text/plain;charset=utf-8'});
	   	  res.write("hello world")
	   	  res.end()
	   	  
	   })
	   
	   app.listen(3000)
	   
	   console.log("sever in running")