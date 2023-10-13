
CREATE TABLE `User` (
    userId INT NOT NULL,
    NIC VARCHAR(20),
    firstName VARCHAR(100),
    middleName VARCHAR(100),
    lastName VARCHAR(100),
    Address VARCHAR(255),
    DOB DATE,
    CONSTRAINT PK_user PRIMARY KEY (userId)
);

CREATE TABLE `Document` (
    documentId INT NOT NULL,
    Name VARCHAR(100),
    Type VARCHAR(100),
    userId INT,
    CONSTRAINT PK_document PRIMARY KEY (documentId),
    CONSTRAINT FK_User FOREIGN KEY (userId) REFERENCES User(userId)
);

CREATE TABLE `adminPanel`(
    adminId INT NOT NULL,
    Name VARCHAR(100),
    NIC VARCHAR(100),
    Address VARCHAR(100),
    DOB DATE,
    CONSTRAINT PK_adminPanel PRIMARY KEY(adminId)
);

CREATE TABLE `managementBoard`(
    managementId INT NOT NULL,
    NIC VARCHAR(20),
    Name VARCHAR(255),
    CONSTRAINT PK_managementBoard PRIMARY KEY(managementId)
);

CREATE TABLE `Feedback`(
    feedbackID INT NOT NULL,
    Type VARCHAR(100),
    userId INT,
    managementId INT,
    CONSTRAINT PK_Feedback PRIMARY KEY(feedbackID),
    CONSTRAINT FK_User FOREIGN KEY(userId) REFERENCES User(userId),
    CONSTRAINT FK_managementBoard FOREIGN KEY(managementId) REFERENCES managementBoard(managementId) 
);

CREATE TABLE `insuranceClaim`(
    claimId INT NOT NULL,
    claimAmount DECIMAL(10, 2),
    Type VARCHAR(100),
    CONSTRAINT PK_insuranceClaim PRIMARY KEY(claimId)
);

CREATE TABLE `insurancePackage` (
    packageId INT NOT NULL,
    Name VARCHAR(255),
    Price DECIMAL(10, 2),
    CONSTRAINT PK_insurancePackage PRIMARY KEY(packageId)
);

CREATE TABLE `marketingTeam` (
    marketingId INT NOT NULL,
    Name VARCHAR(255),
    NIC VARCHAR(20),
    CONSTRAINT PK_marketingTeam PRIMARY KEY(marketingId)
);

CREATE TABLE `Agent` (
    agentId INT NOT NULL,
    Name VARCHAR(255),
    Email VARCHAR(255),
    CONSTRAINT PK_Agent PRIMARY KEY(agentId)
);

CREATE TABLE `Support` (
    supportId INT NOT NULL,
    messageType VARCHAR(100),
    userId INT,
    agentId INT,
    CONSTRAINT PK_Support PRIMARY KEY(supportId),
    CONSTRAINT FK_User FOREIGN KEY(userId) REFERENCES User(userId),
    CONSTRAINT FK_Agent FOREIGN KEY(agentId) REFERENCES Agent(agentId)
);

CREATE TABLE `Dependent` (
    userId INT NOT NULL,
    dependentId INT NOT NULL,
    NIC VARCHAR(20),
    firstName VARCHAR(100),
    middleName VARCHAR(100),
    lastName VARCHAR(100),
    DOB DATE,
    mobileNo VARCHAR(15),
    CONSTRAINT PK_Dependent PRIMARY KEY(userId, dependentId)
);

CREATE TABLE `userMobile` (
    userId INT NOT NULL,
    mobileNumber VARCHAR(15),
    CONSTRAINT PK_userMobile PRIMARY KEY(userId, mobileNumber)
);

CREATE TABLE `adminMobile` (
    adminId INT NOT NULL,
    mobileNumber VARCHAR(15),
    CONSTRAINT PK_adminMobile PRIMARY KEY(adminId, mobileNumber)
);

CREATE TABLE `managementMobile` (
    managementId INT NOT NULL,
    mobileNumber VARCHAR(15),
    CONSTRAINT PK_managementMobile PRIMARY KEY(managementId, mobileNumber)
);

CREATE TABLE `marketingMobile` (
    marketingId INT NOT NULL,
    mobileNumber VARCHAR(15),
    CONSTRAINT PK_marketingMobile PRIMARY KEY (marketingId, mobileNumber)
);

CREATE TABLE `userReqInsClaim` (
    userId INT NOT NULL,
    claimId INT NOT NULL,
    Date DATE,
    CONSTRAINT PK_userReqInsClaim PRIMARY KEY (userId, claimId)
);

CREATE TABLE `useRecInsClaim` (
    userId INT NOT NULL,
    claimId INT NOT NULL,
    CONSTRAINT PK_useRecInsClaim PRIMARY KEY (userId, claimId)
);

CREATE TABLE `userSelectedInsPack` (
    userId INT NOT NULL,
    packageId INT NOT NULL,
    CONSTRAINT PK_userSelectedInsPack PRIMARY KEY (userId, packageId)
);

CREATE TABLE `userPurchaseInsPack` (
    userId INT NOT NULL,
    PackageId INT NOT NULL,
    Date DATE,
    Time TIME,
    paymentType VARCHAR(100),
    CONSTRAINT PK_userPurchaseInsPack PRIMARY KEY (userId, PackageId)
);

CREATE TABLE `insPackIntroMarketing` (
    packageId INT NOT NULL,
    marketingId INT NOT NULL,
    Date DATE,
    Type VARCHAR(100),
    Time TIME,
    CONSTRAINT PK_insPackIntroMarketing PRIMARY KEY (packageId, marketingId)
);

CREATE TABLE `insClaimApproveManagement` (
    claimId INT NOT NULL,
    managementId INT NOT NULL,
    Status VARCHAR(100),
    Date DATE,
    time TIME,
    CONSTRAINT PK_insClaimApproveManagement PRIMARY KEY (claimId, managementId)
);


CREATE TABLE `documVerifyAdmin` (
    documentId INT NOT NULL,
    adminId INT NOT NULL,
    Date DATE,
    Time TIME,
    Description VARCHAR(255),
    CONSTRAINT PK_documVerifyAdmin PRIMARY KEY (documentId, adminId)
);




-- Insert data into the User table
INSERT INTO `User` (userId, NIC, firstName, middleName, lastName, Address, DOB)
VALUES
    (1, '123456789', 'John', 'A.', 'Doe', '123 Main St', '1990-01-15'),
    (2, '987654321', 'Jane', 'B.', 'Smith', '456 Elm St', '1985-03-20'),
    (3, '555555555', 'Michael', 'C.', 'Johnson', '789 Oak St', '1982-07-10'),
    (4, '111111111', 'Emily', 'D.', 'Williams', '987 Pine St', '1995-11-25'),
    (5, '999999999', 'David', 'E.', 'Brown', '654 Birch St', '1993-09-03');

-- Insert data into the Document table
INSERT INTO `Document` (documentId, Name, Type, userId)
VALUES
    (1, 'Document 1', 'Type A', 1),
    (2, 'Document 2', 'Type B', 2),
    (3, 'Document 3', 'Type A', 3),
    (4, 'Document 4', 'Type C', 4),
    (5, 'Document 5', 'Type B', 5);

-- Insert data into the adminPanel table
INSERT INTO `adminPanel` (adminId, Name, NIC, Address, DOB)
VALUES
    (1, 'Admin 1', '111111111', 'Admin Address 1', '1978-04-12'),
    (2, 'Admin 2', '222222222', 'Admin Address 2', '1982-06-25'),
    (3, 'Admin 3', '333333333', 'Admin Address 3', '1975-12-05'),
    (4, 'Admin 4', '444444444', 'Admin Address 4', '1980-08-18'),
    (5, 'Admin 5', '555555555', 'Admin Address 5', '1984-03-29');

-- Insert data into the managementBoard table
INSERT INTO `managementBoard` (managementId, NIC, Name)
VALUES
    (1, '999999999', 'Manager 1'),
    (2, '888888888', 'Manager 2'),
    (3, '777777777', 'Manager 3'),
    (4, '666666666', 'Manager 4'),
    (5, '555555555', 'Manager 5');

-- Insert data into the Feedback table
INSERT INTO `Feedback` (feedbackID, Type, userId, managementId)
VALUES
    (1, 'Type X', 1, 1),
    (2, 'Type Y', 2, 2),
    (3, 'Type Z', 3, 3),
    (4, 'Type A', 4, 4),
    (5, 'Type B', 5, 5);

-- You can continue to insert data into the remaining tables following a similar pattern.



