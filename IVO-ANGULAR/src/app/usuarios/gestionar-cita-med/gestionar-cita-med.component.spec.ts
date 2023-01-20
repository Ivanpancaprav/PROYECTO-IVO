import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GestionarCitaMedComponent } from './gestionar-cita-med.component';

describe('GestionarCitaMedComponent', () => {
  let component: GestionarCitaMedComponent;
  let fixture: ComponentFixture<GestionarCitaMedComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GestionarCitaMedComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(GestionarCitaMedComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
