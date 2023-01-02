<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NavBar</title>
    @include ('components.AdminHeader')
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
</head>

<body style="overflow-y: hidden;">

        <!-- Sidebar -->
        <div class="sidebar">
            {{-- Contents goes here --}}
            <table class="table" >
                <thead>
                  <tr>
                    <th scope="col">From User</th>
                    <th scope="col">Distress Message</th>
                    <th scope="col">Date Received</th>
                  </tr>
                </thead>
                <tbody id="tbody2">
                </tbody>

              </table>
            <input type="hidden" id="barangay" value="{{session('barangay')}}">
        </div>
        {{-- scripts --}}
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="module">

        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
        import {
            getFirestore, doc, getDoc, getDocs, onSnapshot, collection, query, where
        } from 'https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js'
        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyCoTsZLj3mdmt-knoDXPBiAM6XDSo34fO0",
            authDomain: "projectkapitbuhay.firebaseapp.com",
            projectId: "projectkapitbuhay",
            storageBucket: "projectkapitbuhay.appspot.com",
            messagingSenderId: "383943948579",
            appId: "1:383943948579:web:532296ffdafb3a6e3db496",
            measurementId: "G-9DKK3YCYTL"
        };

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const db = getFirestore();

async function GetAllDataRealtime(){
  const dbRef = collection(db,'sos-distress-message');
  const brgy = document.getElementById('barangay');
  const q = query(collection(db,'sos-distress-message'), where("status","==","Unread"), where("receiving_Brgy","==",brgy.value));

  onSnapshot(q,(querySnapshot)=>{
      var distress_notif = [];
      querySnapshot.forEach(doc => {
      distress_notif.push(doc.data());
  });
      AddAllItemsToTable(distress_notif);
  });

}

var tbody = document.getElementById('tbody2');

  function AddAllItemsToTable(TheDistressMSG){
      tbody.innerHTML="";
      var content = "";
      TheDistressMSG.forEach(element =>{
         // AddItemToTable(element.sosID,element.sender_FullName,element.user_location, element.sender_phoneNo,element.distressMessage, element.status);
          let html = `<tr>
          <td><i class="fa-sharp fa-solid fa-eye"></i> ${element.sender_FullName}</td>
          <td>${element.distressMessage}</td>
          <td>${element.sendDate}</td>
          </tr>`;
          content += html;
          tbody.innerHTML = content;
      });
  }

  window.onload = GetAllDataRealtime();
</script>
</body>


<style>
    *{
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
    }

    .sidebar{
        position: fixed;
        border-color: black;
        border:solid;
        width: 300px;
        height: 100vh;
        overflow: hidden;
    }

    .sidebar h3{
        color: white;
        width: 100%;
        margin-left: 10px;
    }

    .sidebar a {
        display: block;
        line-height: 60px;
        transition: 0.5s;
        padding-left: 20px;
        color: white;
    }

    .sidebar a:hover{
        background: rgb(178, 5, 5);
        padding-left: 20px;
    }

    .sidebar span{
        font-size: 20px;
        margin-left:10px;
        color:white;
    }

    .sidebar a:link{
        text-decoration: none;
    }
@media (max-width:850px){
    .sidebar a span, h3{
        display: none;
    }
    .sidebar{
        width:100px;
    }
.sidebar a{
        display:block;
        line-height: 80px;
        text-align: center;
        margin-left: 0;
        font-size: 35px;
        padding-left:0;
    }

}
</style>
