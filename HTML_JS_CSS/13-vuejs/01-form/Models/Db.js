class User
{
    constructor(id, username, password)
    {
        this.id = id;
        this.username = username;
        this.password = password;
    }
}

class Db 
{
    constructor()
    {
        this.users = [];
        this.currentUser = null;
    }

    getAll() 
    {
        this.users = [
            new User(1, 'mdevoldere', 'azerty'),
            new User(2, 'johnny', 'azer'),
            new User(3, 'benjamin', '1234'),
        ];

        return this.users;
    }

    login(username, password)
    {
        for(let user of this.users) {
            if(username === user.username && password === user.password) {
                this.currentUser = user;
                return true;
            }
        }

        return false;
    }
}

export { User, Db }