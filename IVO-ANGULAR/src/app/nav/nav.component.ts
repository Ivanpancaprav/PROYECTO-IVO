import { Component, OnInit } from '@angular/core';
import { TokenStorageService } from '../_services/token-storage.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.css']
})
export class NavComponent implements OnInit {

  @Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.css']
  })

  private roles: string[] = [];
  isLoggedIn = false;
  // showAdminBoard = false;
  // showModeratorBoard = false;
  protected nombre?: string;
  protected medico: boolean;
  protected paciente: boolean;
  protected email: string;
  protected dni: string;
  public styles = {};


  constructor(private tokenStorageService: TokenStorageService, private route: ActivatedRoute) {
    this.medico = false;
    this.paciente = false;
    this.email = "";
    this.dni ="";
  }

  ngOnInit(): void {
    this.isLoggedIn = !!this.tokenStorageService.getToken();


    if (this.isLoggedIn) {
      const user = this.tokenStorageService.getUser();
      this.dni = user.success.dni;
      this.email = user.success.email;
      this.dni = user.success.dni;
      this.nombre = user.nombre;
      console.log(user.success.role);

      switch (user.success.role) {
        case 'medico':
          this.medico = true;
          break;

        case 'paciente':
          this.paciente = true;
          break;
      }

    }
  }
  logout(): void {
    this.tokenStorageService.signOut();
    window.location.reload();
  }


}

