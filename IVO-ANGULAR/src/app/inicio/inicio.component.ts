import { Component } from '@angular/core';
import { TokenStorageService } from '../_services/token-storage.service';

@Component({
  selector: 'app-inicio',
  templateUrl: './inicio.component.html',
  styleUrls: ['./inicio.component.css']
})
export class InicioComponent {
  protected currentUser : any;
  protected medico: boolean;
  protected paciente: boolean;

  constructor(private token: TokenStorageService) { 
    this.medico=false;
    this.paciente=false;

  }

  ngOnInit(): void {
    this.currentUser = this.token.getUser();
    console.log(this.currentUser.success.role);
    
    switch(this.currentUser.success.role){
      case 'medico':
        this.medico = true;
        break;

      case 'paciente':
        this.paciente = true;
        break;
    }

    
  }
  logout(): void {
    this.token.signOut();
    window.location.reload();
  }

}
