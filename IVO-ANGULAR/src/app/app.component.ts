import { Component, OnInit } from '@angular/core';
import { TokenStorageService } from './_services/token-storage.service'
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent implements OnInit {
  title = 'IVO-ANGULAR';

  private roles: string[] = [];
  isLoggedIn = false;
  logueado = false;
  // showAdminBoard = false;
  // showModeratorBoard = false;
  nombre?: string;

  constructor(private tokenStorageService: TokenStorageService) { }



  ngOnInit(): void {
    this.isLoggedIn = !!this.tokenStorageService.getToken();

    if (this.isLoggedIn) {
     this.logueado = true;
      const user = this.tokenStorageService.getUser();
      this.roles = user.roles;

      // this.showAdminBoard = this.roles.includes('ROLE_ADMIN');
      // this.showModeratorBoard = this.roles.includes('ROLE_MODERATOR');

      this.nombre = user.nombre;
    }
  }
  logout(): void {
    this.logueado  = false;
    this.tokenStorageService.signOut();
    window.location.reload();
  }



}


