 <div>
   <a class="hiddenanchor" id="signup"></a>
   <a class="hiddenanchor" id="signin"></a>
   <div class="login_wrapper">
     <div class="animate form login_form">
       <div align="center">
         <div class="separator">
           <div>
             <h1>WelCome TLU</h1>
           </div>
         </div>
         <img src="/public/images/logo.png" width="50%">
       </div>
       <section class="login_content">
         <form method="POST">
           <h1>Admin login</h1>
           <div>
             <input type="text" class="form-control" placeholder="username" name="username" required>
           </div>
           <div>
             <input type="password" class="form-control" placeholder="password" name="password" required>
           </div>
           <div>
             <button class="btn btn-light submit" style=" background: #fff;text-decoration: none;border: solid 1px #ccc;">Log in</button>
           </div>
           <div class="clearfix"></div>
           <div class="separator">
             <div>
               <h1><?php echo $message; ?></h1>
             </div>
           </div>
         </form>
       </section>
     </div>
   </div>
 </div>
