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
  public styles = {};


  constructor(private tokenStorageService: TokenStorageService, private route: ActivatedRoute) {
    this.medico = false;
    this.paciente = false;
    this.email = "";
  }

  ngOnInit(): void {
    this.isLoggedIn = !!this.tokenStorageService.getToken();

    const currentRoute = this.route.snapshot.url.join('/');

  if (currentRoute == 'pacientes') {
    this.styles = { 'background-color': 'blue' };
  }

    if (this.isLoggedIn) {
      const user = this.tokenStorageService.getUser();

      this.email = user.success.email;

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

