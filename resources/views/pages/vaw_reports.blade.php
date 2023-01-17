@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Title')

<!-- Styles -->
@section('styles')
<style>
    .container text-center {
    margin-top: 100%;
}
</style>
@stop

<!-- Content -->
@section('content')
<div class="container text-center" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <div class="row mt-5" >
        <div class="row justify-content-center mt-2">
        </div>
        <div class="row justify-content-center ">
            <div class="col-auto text-dark h4">
                Incident Statistics Report
            </div>
        </div>
    </div>
    <div class="row gy-5 my-5 mx-5">
      <div class="col-6">
        <canvas id="totalcases" style="width:100%"></canvas>
      </div>
      <div class="col-6">
        <canvas id="totalclosedcased" style="width:50%;max-width:600px;"></canvas>
      </div>
      <div class="col-6">
        <canvas id="totalopencases" style="width:50%;max-width:600px;"></canvas>
      </div>

      <div class="col-6">
        <canvas id="totalphysicalabuse" style="width:50%;max-width:600px;"></canvas>
      </div>

      <div class="col-6">
        <canvas id="totalsexualviolence" style="width:50%;max-width:600px;"></canvas>
      </div>

      <div class="col-6">
        <canvas id="totalemotionalAbuse" style="width:50%;max-width:600px;"></canvas>
      </div>

      <div class="col-6">
        <canvas id="totalChildAbuse" style="width:50%;max-width:600px;"></canvas>
      </div>


    </div>


  </div>
@stop

<!-- Scripts -->
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script type="module">
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
  import {
        getFirestore, doc, getDoc, getDocs, onSnapshot, collection, query, where, getCountFromServer
  } from 'https://www.gstatic.com/firebasejs/9.15.0/firebase-firestore.js'
  const firebaseConfig = {
            apiKey: "AIzaSyCoTsZLj3mdmt-knoDXPBiAM6XDSo34fO0",
            authDomain: "projectkapitbuhay.firebaseapp.com",
            projectId: "projectkapitbuhay",
            storageBucket: "projectkapitbuhay.appspot.com",
            messagingSenderId: "383943948579",
            appId: "1:383943948579:web:532296ffdafb3a6e3db496",
            measurementId: "G-9DKK3YCYTL"
        };
  const app = initializeApp(firebaseConfig);
  const db = getFirestore();
  var yValues1 = [];
  var yValues2 = [];
  var yValues3 = [];

  var physicalAbuse = [];

  var yValues = [1,2,3,4,5,6,7,8,9,10,11,12];
  var count1 = 0;
  var count2 = 0;
  var count3 = 0;

  var count = 0;
  getotalcases();
   async function getotalcases(){
      const coll = collection(db, "incident_reports");
      for (let i = 0; i < 12; i++) {
      const query_1 = query(coll,where('creatorType', '==', 'barangay'), where('barangay', '==', 'Mabolo'),where('month_sent', '==', i+1));
      const querySnapshot = await getDocs(query_1);
        querySnapshot.forEach((doc) => {
  // doc.data() is never undefined for query doc snapshots
        count1++;
        //console.log(doc.id, " => ", doc.data());
      });
      yValues1.push(count1);
      count1 = 0;
      }
    }
    getotalongoingcases();

   async function getotalongoingcases(){
    const coll = collection(db, "incident_reports");
    for (let i = 0; i < 12; i++) {

      const query_1 = query(coll,where('creatorType', '==', 'barangay'), where('barangay', '==', 'Mabolo'),where('month_sent', '==', i+1),where('report_status', '==', 'Ongoing'));
      const querySnapshot = await getDocs(query_1);
        querySnapshot.forEach((doc) => {
        count2++;
        //console.log(doc.id, " => ", doc.data());
      });
      yValues2.push(count2);
      count2 = 0;
    }


  }
  getotalclosedcases();
   async function getotalclosedcases(){
      const coll = collection(db, "incident_reports");
      for (let i = 0; i < 12; i++) {
      const query_1 = query(coll,where('creatorType', '==', 'barangay'), where('barangay', '==', 'Mabolo'),where('month_sent', '==', i+1),where('report_status', '==', 'Closed'));
      const querySnapshot = await getDocs(query_1);
        querySnapshot.forEach((doc) => {
        count3++;
        //console.log(doc.id, " => ", doc.data());
      });
      yValues3.push(count3);
      count3 = 0;
    }
  }

  getphysicalAbuse();
   async function getphysicalAbuse(){
      const coll = collection(db, "incident_reports");
      for (let i = 0; i < 12; i++) {
      const query_1 = query(coll,where('creatorType', '==', 'barangay'), where('barangay', '==', 'Mabolo'),where('month_sent', '==', i+1),where('type_of_incident', '==', 'Physical Abuse'));
      const querySnapshot = await getDocs(query_1);
        querySnapshot.forEach((doc) => {
        count++;
        //console.log(doc.id, " => ", doc.data());
      });
      physicalAbuse.push(count);
      count = 0;
    }
  } 
  var sexualviolence = [];
  getsexualviolence();
   async function getsexualviolence(){
      const coll = collection(db, "incident_reports");
      for (let i = 0; i < 12; i++) {
      const query_1 = query(coll,where('creatorType', '==', 'barangay'), where('barangay', '==', 'Mabolo'),where('month_sent', '==', i+1),where('type_of_incident', '==', 'Sexual Violence'));
      const querySnapshot = await getDocs(query_1);
        querySnapshot.forEach((doc) => {
        count++;
        //console.log(doc.id, " => ", doc.data());
      });
      sexualviolence.push(count);
      count = 0;
    }
  } 

  var emotionalAbuse = [];
  getemotionalAbuse();
   async function getemotionalAbuse(){
      const coll = collection(db, "incident_reports");
      for (let i = 0; i < 12; i++) {
      const query_1 = query(coll,where('creatorType', '==', 'barangay'), where('barangay', '==', 'Mabolo'),where('month_sent', '==', i+1),where('type_of_incident', '==', 'Emotional Abuse'));
      const querySnapshot = await getDocs(query_1);
        querySnapshot.forEach((doc) => {
        count++;
        //console.log(doc.id, " => ", doc.data());
      });
      emotionalAbuse.push(count);
      count = 0;
    }
  }

  var childAbuse = [];
  getchildAbuse();
   async function getchildAbuse(){
      const coll = collection(db, "incident_reports");
      for (let i = 0; i < 12; i++) {
      const query_1 = query(coll,where('creatorType', '==', 'barangay'), where('barangay', '==', 'Mabolo'),where('month_sent', '==', i+1),where('type_of_incident', '==', 'Child Abuse'));
      const querySnapshot = await getDocs(query_1);
        querySnapshot.forEach((doc) => {
        count++;
        //console.log(doc.id, " => ", doc.data());
      });
      childAbuse.push(count);
      count = 0;
    }
  }


    var xValues = ["January", "February", "March", "April", "May", "June", "July", "August","September", "October", "November","December"];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145",
      "#2f7965",
      "#FFB26B",
      "#7B2869",
      "#FFB100",
      "#FF78F0",
      "#FCFFE7",
      "#EB6440"

    ];

new Chart("totalcases", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: 'TotalCases',
        backgroundColor: barColors,
        data: yValues1
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Cases"
    }
  }
});
new Chart("totalclosedcased", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: 'Total Closed Cases',
        backgroundColor: barColors,
        data: yValues3
    }]
  }
  ,
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Closed Cases"
    }
  }

});

new Chart("totalopencases", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: 'Total Cases',
        backgroundColor: barColors,
        data: yValues2
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Open Cases"
    }
  }
});

new Chart("totalphysicalabuse", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: 'Total Physical Abuse Cases',
        backgroundColor: barColors,
        data: physicalAbuse
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Physical Abuse Cases"
    }
  }
});

new Chart("totalsexualviolence", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: 'Total Sexual Violence Cases',
        backgroundColor: barColors,
        data: sexualviolence
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Sexual Violence Cases"
    }
  }
});


new Chart("totalemotionalAbuse", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: 'Total Emotional Abuse Cases',
        backgroundColor: barColors,
        data: emotionalAbuse
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Emotional Abuse Cases"
    }
  }
});

new Chart("totalChildAbuse", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
        label: 'Total Child Abuse Cases',
        backgroundColor: barColors,
        data: childAbuse
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Child Abuse Cases"
    }
  }
});

//window.onload = getotalcases;

</script>
@stop
