#include <stdio.h> 
#include <stdlib.h>
#include <string.h> 

void ask_size(int* line, int* column){
    do{
        printf("please enter line size : ");
        scanf("%d", line);
        printf("\nplease enter column size : ");
        scanf("%d", column);

        if((*line < 1 || *column < 1) && (*line > 10 || *column > 10)) printf("invalid value. Mini size = 10 and Max size = 10");

    }while((*line < 1 || *column < 1) && (*line > 10 || *column > 10));
}

int** mem_allo_array(int* line, int*column){
    int** array = malloc(sizeof(int*) * (*line));
    for(int i = 0; i < (*line); i++){
        array[i] = malloc(sizeof(int) * (*column));
    }
    return array;
}

void init_array(int** array, int* line, int* column){
    for(int i = 0; i < (*line); i++){
        for(int y = 0; y < (*column); y++){
            array[i][y] = 0;
        }
    }
}

void display_array(int** array, int* line, int* column){
    for(int i = 0; i < (*line); i++){
        for(int y = 0; y < (*column); y++){
            printf("%d", array[i][y]);
        }
        printf("\n");
    }
}

void free_array(int** array, int* line){
    for(int i = 0; i < (*line); i++){
        free(array[i]);
    }
}

void array_prog(int*** array, int* line, int* column){
    ask_size(line, column);
    *array = mem_allo_array(line, column);
    init_array(*array, line, column);
    display_array(*array, line, column);
    free_array(*array, line);
}

int main(void){
    int** array = NULL;
    int line, column;
    array_prog(&array, &line, &column);
}