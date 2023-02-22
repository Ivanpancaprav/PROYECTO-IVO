import { Component, Input, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-paciente',
  templateUrl: './paciente.component.html',
  styleUrls: ['./paciente.component.css']
})
export class PacienteComponent {

 
  constructor(private_route: ActivatedRoute){}
  
    @Input() paciente: any;  


  ngOnInit(): void{
    console.log(this.paciente);
  }
}