import { Component, Input, OnInit } from '@angular/core';

@Component({
  selector: 'app-paciente',
  templateUrl: './paciente.component.html',
  styleUrls: ['./paciente.component.css']
})
export class PacienteComponent {

 
  constructor(){}
  
    @Input() paciente: any;  


  ngOnInit(): void{
    console.log(this.paciente);
  }
}